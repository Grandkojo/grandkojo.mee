<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::published()
            ->orderBy('published_at', 'desc')
            ->paginate(9);

        return view('blog.index', compact('blogs'));
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        
        // Increment view count (with cache to prevent abuse)
        $cacheKey = "blog_view_{$blog->id}_" . request()->ip();
        if (!Cache::has($cacheKey)) {
            $blog->incrementViews();
            Cache::put($cacheKey, true, now()->addMinutes(30));
        }

        // Check if current user has liked this post
        $likeCacheKey = "blog_like_{$blog->id}_" . request()->ip();
        $hasLiked = Cache::has($likeCacheKey);

        $relatedBlogs = Blog::published()
            ->where('id', '!=', $blog->id)
            ->limit(3)
            ->get();

        return view('blog.show', compact('blog', 'relatedBlogs', 'hasLiked'));
    }

    public function like($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        
        // Like/unlike system with IP-based cache
        $cacheKey = "blog_like_{$blog->id}_" . request()->ip();
        $hasLiked = Cache::has($cacheKey);
        
        if ($hasLiked) {
            // User has already liked, so unlike
            $blog->decrementLikes();
            Cache::forget($cacheKey);
            return response()->json([
                'success' => true, 
                'likes' => max(0, $blog->fresh()->likes), // Ensure likes never go below 0
                'action' => 'unliked'
            ]);
        } else {
            // User hasn't liked, so like
            $blog->incrementLikes();
            Cache::put($cacheKey, true, now()->addHours(24));
            return response()->json([
                'success' => true, 
                'likes' => $blog->fresh()->likes,
                'action' => 'liked'
            ]);
        }
    }

    public function comment(Request $request, $slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        
        // Check if user is identified (has session data)
        if (session('blog_user_name') && session('blog_user_email')) {
            // User is identified, only validate content and captcha
            $request->validate([
                'content' => 'required|string|min:10|max:1000',
                'captcha' => 'required|string',
                'parent_id' => 'nullable|exists:blog_comments,id',
            ]);

            $name = session('blog_user_name');
            $email = session('blog_user_email');
        } else {
            // User is not identified, validate all fields
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'content' => 'required|string|min:10|max:1000',
                'captcha' => 'required|string',
                'parent_id' => 'nullable|exists:blog_comments,id',
            ]);

            $name = $request->name;
            $email = $request->email;
        }

        // Simple captcha validation
        if (strtolower($request->captcha) !== 'grandkojo') {
            return back()->withErrors(['captcha' => 'Invalid captcha. Please enter "grandkojo"']);
        }

        // Check for spam
        $comment = new BlogComment([
            'blog_id' => $blog->id,
            'parent_id' => $request->parent_id,
            'name' => $name,
            'email' => $email,
            'content' => $request->content,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'captcha_token' => Str::random(32),
        ]);

        // Auto-approve if not spam
        if (!$comment->isSpam()) {
            $comment->status = 'approved';
        }

        $comment->save();

        return back()->with('success', 'Comment submitted successfully! It will be visible after approval.');
    }

    public function identify(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        // Store user info in session for comment forms
        session([
            'blog_user_name' => $request->name,
            'blog_user_email' => $request->email,
        ]);

        return back()->with('success', 'You are now identified as ' . $request->name);
    }
} 