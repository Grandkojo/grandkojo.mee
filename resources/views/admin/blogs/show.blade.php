@extends('layouts.admin')

@section('title', 'View Blog Post')

@push('styles')
<style>
    .prose {
        max-width: none;
    }
    .prose h1, .prose h2, .prose h3, .prose h4, .prose h5, .prose h6 {
        color: #1b1b18;
    }
    .dark .prose h1, .dark .prose h2, .dark .prose h3, .dark .prose h4, .dark .prose h5, .dark .prose h6 {
        color: #ffffff;
    }
    .prose p {
        color: #706f6c;
    }
    .dark .prose p {
        color: #A1A09A;
    }
    .prose strong {
        color: #1b1b18;
    }
    .dark .prose strong {
        color: #ffffff;
    }
    .prose a {
        color: #3b82f6;
    }
    .dark .prose a {
        color: #60a5fa;
    }
    .prose blockquote {
        border-left-color: #3E3E3A;
    }
    .dark .prose blockquote {
        border-left-color: #3E3E3A;
    }
    .prose code {
        background-color: #1a1a1a;
        color: #1b1b18;
    }
    .dark .prose code {
        background-color: #000000;
        color: #ffffff;
    }
    .prose pre {
        background-color: #1a1a1a;
        color: #EDEDEC;
    }
    .dark .prose pre {
        background-color: #000000;
        color: #ffffff;
    }
</style>
@endpush

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-white">View Blog Post</h1>
        <div class="flex space-x-3">
            <a href="{{ route('admin.blogs.edit', $blog) }}" 
                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                Edit Post
            </a>
            <a href="{{ route('admin.blogs.index') }}" 
                class="text-[#A1A09A] hover:text-white transition-colors">
                ← Back to Blog Management
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-3 space-y-8">
            <!-- Blog Post Content -->
            <div class="bg-black rounded-lg shadow-sm border border-[#3E3E3A] overflow-hidden">
                <!-- Featured Image -->
                @if($blog->featured_image)
                    <div class="aspect-video bg-black">
                        <img src="{{ $blog->featured_image_url }}" alt="{{ $blog->title }}" class="w-full h-full object-cover">
                    </div>
                @endif

                <div class="p-8">
                    <!-- Post Meta -->
                    <div class="flex items-center space-x-4 mb-6 text-sm text-[#A1A09A]">
                        <span class="flex items-center space-x-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span>{{ $blog->published_at ? $blog->published_at->format('F j, Y') : 'Not published' }}</span>
                        </span>
                        <span>•</span>
                        <span class="flex items-center space-x-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>{{ $blog->minutes_read }} min read</span>
                        </span>
                        <span>•</span>
                        <span class="flex items-center space-x-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            <span>{{ number_format($blog->views) }} views</span>
                        </span>
                        <span>•</span>
                        <span class="flex items-center space-x-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                            <span>{{ number_format($blog->likes) }} likes</span>
                        </span>
                    </div>

                    <!-- Title -->
                    <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">
                        {{ $blog->title }}
                    </h1>

                    <!-- Status Badge -->
                    <div class="mb-6">
                        @if($blog->status === 'published')
                            <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-green-900 text-green-200">
                                Published
                            </span>
                        @else
                            <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-yellow-900 text-yellow-200">
                                Draft
                            </span>
                        @endif
                    </div>

                    <!-- Excerpt -->
                    @if($blog->excerpt)
                        <p class="text-xl text-[#A1A09A] mb-8 leading-relaxed">
                            {{ $blog->excerpt }}
                        </p>
                    @endif

                    <!-- Meta Tags -->
                    @if($blog->meta_tags && count($blog->meta_tags) > 0)
                        <div class="flex flex-wrap gap-2 mb-8">
                            @foreach($blog->meta_tags as $tag)
                                <span class="px-3 py-1 bg-black text-[#A1A09A] rounded-full text-sm border border-[#3E3E3A]">
                                    {{ $tag }}
                                </span>
                            @endforeach
                        </div>
                    @endif

                    <!-- Content -->
                    <div class="prose prose-lg max-w-none">
                        {!! $blog->content !!}
                    </div>
                </div>
            </div>

            <!-- Comments Section -->
            <div class="bg-black rounded-lg shadow-sm border border-[#3E3E3A] p-8">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-white">
                        Comments ({{ $blog->comments->count() }})
                    </h2>
                    <a href="{{ route('admin.blogs.comments') }}" 
                        class="text-blue-400 hover:text-blue-300 transition-colors">
                        Manage All Comments →
                    </a>
                </div>

                @if($blog->comments->count() > 0)
                    <div class="space-y-6">
                        @foreach($blog->comments->take(5) as $comment)
                            <div class="border border-[#3E3E3A] rounded-lg p-4">
                                <div class="flex items-start justify-between">
                                    <div class="flex-1">
                                        <div class="flex items-center space-x-2 mb-2">
                                            <h4 class="text-sm font-medium text-white">
                                                {{ $comment->name }}
                                                @if($comment->is_admin_reply)
                                                    <span class="ml-2 px-2 py-1 bg-blue-900 text-blue-200 text-xs rounded-full">Admin</span>
                                                @endif
                                            </h4>
                                            <span class="text-xs text-[#A1A09A]">
                                                {{ $comment->created_at->diffForHumans() }}
                                            </span>
                                            <span class="px-2 py-1 text-xs rounded-full 
                                                @if($comment->status === 'approved') bg-green-900 text-green-200
                                                @elseif($comment->status === 'pending') bg-yellow-900 text-yellow-200
                                                @else bg-red-900 text-red-200 @endif">
                                                {{ ucfirst($comment->status) }}
                                            </span>
                                        </div>
                                        <p class="text-[#A1A09A] text-sm">
                                            {{ $comment->content }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        
                        @if($blog->comments->count() > 5)
                            <div class="text-center">
                                <a href="{{ route('admin.blogs.comments') }}" 
                                    class="text-blue-400 hover:text-blue-300 transition-colors">
                                    View all {{ $blog->comments->count() }} comments →
                                </a>
                            </div>
                        @endif
                    </div>
                @else
                    <div class="text-center py-8">
                        <svg class="w-12 h-12 text-[#A1A09A] mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                        <p class="text-[#A1A09A]">No comments yet</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Quick Stats -->
            <div class="bg-black rounded-lg shadow-sm border border-[#3E3E3A] p-6">
                <h3 class="text-lg font-semibold text-white mb-4">Quick Stats</h3>
                
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-[#A1A09A]">Views</span>
                        <span class="font-semibold text-white">{{ number_format($blog->views) }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-[#A1A09A]">Likes</span>
                        <span class="font-semibold text-white">{{ number_format($blog->likes) }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-[#A1A09A]">Comments</span>
                        <span class="font-semibold text-white">{{ $blog->comments->count() }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-[#A1A09A]">Reading Time</span>
                        <span class="font-semibold text-white">{{ $blog->minutes_read }} min</span>
                    </div>
                </div>
            </div>

            <!-- Post Details -->
            <div class="bg-black rounded-lg shadow-sm border border-[#3E3E3A] p-6">
                <h3 class="text-lg font-semibold text-white mb-4">Post Details</h3>
                
                <div class="space-y-3 text-sm">
                    <div>
                        <span class="text-[#A1A09A]">Slug:</span>
                        <div class="font-mono text-white break-all">{{ $blog->slug }}</div>
                    </div>
                    <div>
                        <span class="text-[#A1A09A]">Created:</span>
                        <div class="text-white">{{ $blog->created_at->format('M j, Y g:i A') }}</div>
                    </div>
                    <div>
                        <span class="text-[#A1A09A]">Updated:</span>
                        <div class="text-white">{{ $blog->updated_at->format('M j, Y g:i A') }}</div>
                    </div>
                    @if($blog->published_at)
                        <div>
                            <span class="text-[#A1A09A]">Published:</span>
                            <div class="text-white">{{ $blog->published_at->format('M j, Y g:i A') }}</div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- SEO Info -->
            @if($blog->meta_description || $blog->meta_tags)
                <div class="bg-black rounded-lg shadow-sm border border-[#3E3E3A] p-6">
                    <h3 class="text-lg font-semibold text-white mb-4">SEO Information</h3>
                    
                    @if($blog->meta_description)
                        <div class="mb-4">
                            <span class="text-[#A1A09A] text-sm">Meta Description:</span>
                            <p class="text-white text-sm mt-1">{{ $blog->meta_description }}</p>
                        </div>
                    @endif
                    
                    @if($blog->meta_tags && count($blog->meta_tags) > 0)
                        <div>
                            <span class="text-[#A1A09A] text-sm">Tags:</span>
                            <div class="flex flex-wrap gap-1 mt-1">
                                @foreach($blog->meta_tags as $tag)
                                    <span class="px-2 py-1 bg-black text-[#A1A09A] rounded text-xs border border-[#3E3E3A]">
                                        {{ $tag }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            @endif

            <!-- Actions -->
            <div class="bg-black rounded-lg shadow-sm border border-[#3E3E3A] p-6">
                <h3 class="text-lg font-semibold text-white mb-4">Actions</h3>
                
                <div class="space-y-3">
                    <a href="{{ route('blog.show', $blog->slug) }}" target="_blank"
                        class="w-full px-4 py-2 bg-white text-black rounded-lg hover:bg-gray-200 transition-colors text-center block">
                        View Live
                    </a>
                    
                    <a href="{{ route('admin.blogs.edit', $blog) }}"
                        class="w-full px-4 py-2 border border-[#3E3E3A] text-[#A1A09A] rounded-lg hover:bg-[#1a1a1a] transition-colors text-center block">
                        Edit Post
                    </a>
                    
                    <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" 
                        onsubmit="return confirm('Are you sure you want to delete this blog post? This action cannot be undone.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                            class="w-full px-4 py-2 border border-red-700 text-red-400 rounded-lg hover:bg-red-900/20 transition-colors">
                            Delete Post
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 