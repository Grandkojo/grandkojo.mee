<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published',
            'minutes_read' => 'required|integer|min:1|max:60',
            'meta_tags' => 'nullable|string',
            'meta_description' => 'nullable|string|max:160',
            'published_at' => 'nullable|date',
        ]);

        $data = $request->all();
        
        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('blogs', 'gcs');
            $data['featured_image'] = $path;
        }

        // Handle meta tags
        if ($request->meta_tags) {
            $tags = array_map('trim', explode(',', $request->meta_tags));
            $data['meta_tags'] = $tags;
        }

        // Set published_at if status is published
        if ($request->status === 'published' && !$request->published_at) {
            $data['published_at'] = now();
        }

        Blog::create($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post created successfully!');
    }

    public function show(Blog $blog)
    {
        return view('admin.blogs.show', compact('blog'));
    }

    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published',
            'minutes_read' => 'required|integer|min:1|max:60',
            'meta_tags' => 'nullable|string',
            'meta_description' => 'nullable|string|max:160',
            'published_at' => 'nullable|date',
        ]);

        $data = $request->all();
        
        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            // Delete old image
            if ($blog->featured_image) {
                Storage::disk('gcs')->delete($blog->featured_image);
            }
            $path = $request->file('featured_image')->store('blogs', 'gcs');
            $data['featured_image'] = $path;
        }

        // Handle meta tags
        if ($request->meta_tags) {
            $tags = array_map('trim', explode(',', $request->meta_tags));
            $data['meta_tags'] = $tags;
        }

        // Set published_at if status is published and not already set
        if ($request->status === 'published' && !$blog->published_at && !$request->published_at) {
            $data['published_at'] = now();
        }

        $blog->update($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post updated successfully!');
    }

    public function destroy(Blog $blog)
    {
        // Delete featured image
        if ($blog->featured_image) {
            Storage::disk('gcs')->delete($blog->featured_image);
        }

        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post deleted successfully!');
    }

    public function preview(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'minutes_read' => 'required|integer|min:1|max:60',
            'meta_tags' => 'nullable|string',
            'meta_description' => 'nullable|string|max:160',
        ]);

        // Create a temporary blog object for preview
        $blog = new Blog($request->all());
        $blog->id = 0; // Temporary ID for preview
        $blog->slug = Str::slug($request->title);
        $blog->status = 'draft';
        $blog->views = 0;
        $blog->likes = 0;
        $blog->created_at = now();
        $blog->updated_at = now();

        // Handle meta tags
        if ($request->meta_tags) {
            $tags = array_map('trim', explode(',', $request->meta_tags));
            $blog->meta_tags = $tags;
        }

        return view('blog.show', compact('blog'));
    }

    public function comments()
    {
        $comments = BlogComment::with(['blog', 'parent'])
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('admin.blogs.comments', compact('comments'));
    }

    public function approveComment(BlogComment $comment)
    {
        $comment->approve();
        return back()->with('success', 'Comment approved successfully!');
    }

    public function spamComment(BlogComment $comment)
    {
        $comment->markAsSpam();
        return back()->with('success', 'Comment marked as spam!');
    }

    public function deleteComment(BlogComment $comment)
    {
        $comment->delete();
        return back()->with('success', 'Comment deleted successfully!');
    }

    public function reply(Request $request, BlogComment $comment)
    {
        $request->validate([
            'content' => 'required|string|min:10|max:1000',
        ]);

        BlogComment::create([
            'blog_id' => $comment->blog_id,
            'parent_id' => $comment->id,
            'name' => 'Admin',
            'email' => 'admin@grandkojo.me',
            'content' => $request->content,
            'status' => 'approved',
            'is_admin_reply' => true,
        ]);

        return back()->with('success', 'Reply posted successfully!');
    }
} 