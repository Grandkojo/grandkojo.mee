@extends('layouts.admin')

@section('title', 'Blog Management')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-[#1b1b18] dark:text-[#EDEDEC]">Blog Management</h1>
        <a href="{{ route('admin.blogs.create') }}" 
            class="bg-[#1b1b18] dark:bg-[#EDEDEC] text-[#FDFDFC] dark:text-[#0a0a0a] px-6 py-2 rounded-lg hover:bg-[#706f6c] dark:hover:bg-[#A1A09A] transition-colors">
            Create New Post
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 dark:bg-green-900 border border-green-400 dark:border-green-700 text-green-700 dark:text-green-300 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white dark:bg-[#1a1a1a] rounded-lg shadow-sm border border-[#3E3E3A] dark:border-[#3E3E3A] overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-[#3E3E3A] dark:divide-[#3E3E3A]">
                <thead class="bg-[#f5f5f5] dark:bg-[#0a0a0a]">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-wider">
                            Post
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-wider">
                            Status
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-wider">
                            Views
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-wider">
                            Likes
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-wider">
                            Published
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-[#1a1a1a] divide-y divide-[#3E3E3A] dark:divide-[#3E3E3A]">
                    @forelse($blogs as $blog)
                        <tr class="hover:bg-[#f5f5f5] dark:hover:bg-[#0a0a0a] transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    @if($blog->featured_image)
                                        <div class="flex-shrink-0 h-12 w-12">
                                            <img class="h-12 w-12 rounded-lg object-cover" src="{{ $blog->featured_image_url }}" alt="{{ $blog->title }}">
                                        </div>
                                    @else
                                        <div class="flex-shrink-0 h-12 w-12 bg-gradient-to-br from-[#706f6c] to-[#A1A09A] rounded-lg flex items-center justify-center">
                                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                            </svg>
                                        </div>
                                    @endif
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC]">
                                            {{ $blog->title }}
                                        </div>
                                        <div class="text-sm text-[#706f6c] dark:text-[#A1A09A]">
                                            {{ Str::limit($blog->excerpt, 60) }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($blog->status === 'published')
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200">
                                        Published
                                    </span>
                                @else
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200">
                                        Draft
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-[#706f6c] dark:text-[#A1A09A]">
                                {{ number_format($blog->views) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-[#706f6c] dark:text-[#A1A09A]">
                                {{ number_format($blog->likes) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-[#706f6c] dark:text-[#A1A09A]">
                                @if($blog->published_at)
                                    {{ $blog->published_at->format('M j, Y') }}
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-2">
                                    <a href="{{ route('admin.blogs.show', $blog) }}" 
                                        class="text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">
                                        View
                                    </a>
                                    <a href="{{ route('admin.blogs.edit', $blog) }}" 
                                        class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 transition-colors">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" class="inline" 
                                        onsubmit="return confirm('Are you sure you want to delete this blog post?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                            class="text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300 transition-colors">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center">
                                <div class="text-[#706f6c] dark:text-[#A1A09A]">
                                    <svg class="mx-auto h-12 w-12 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                    </svg>
                                    <h3 class="text-lg font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2">No blog posts yet</h3>
                                    <p>Get started by creating your first blog post.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if($blogs->hasPages())
        <div class="mt-6">
            {{ $blogs->links() }}
        </div>
    @endif

    <!-- Quick Actions -->
    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white dark:bg-[#1a1a1a] rounded-lg shadow-sm border border-[#3E3E3A] dark:border-[#3E3E3A] p-6">
            <h3 class="text-lg font-semibold text-[#1b1b18] dark:text-[#EDEDEC] mb-4">Comments</h3>
            <p class="text-[#706f6c] dark:text-[#A1A09A] mb-4">Manage and moderate blog comments.</p>
            <a href="{{ route('admin.blogs.comments') }}" 
                class="inline-flex items-center px-4 py-2 bg-[#1b1b18] dark:bg-[#EDEDEC] text-[#FDFDFC] dark:text-[#0a0a0a] rounded-lg hover:bg-[#706f6c] dark:hover:bg-[#A1A09A] transition-colors">
                Manage Comments
            </a>
        </div>
        
        <div class="bg-white dark:bg-[#1a1a1a] rounded-lg shadow-sm border border-[#3E3E3A] dark:border-[#3E3E3A] p-6">
            <h3 class="text-lg font-semibold text-[#1b1b18] dark:text-[#EDEDEC] mb-4">Statistics</h3>
            <div class="grid grid-cols-2 gap-4">
                <div class="text-center">
                    <div class="text-2xl font-bold text-[#1b1b18] dark:text-[#EDEDEC]">
                        {{ $blogs->where('status', 'published')->count() }}
                    </div>
                    <div class="text-sm text-[#706f6c] dark:text-[#A1A09A]">Published Posts</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl font-bold text-[#1b1b18] dark:text-[#EDEDEC]">
                        {{ $blogs->where('status', 'draft')->count() }}
                    </div>
                    <div class="text-sm text-[#706f6c] dark:text-[#A1A09A]">Draft Posts</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 