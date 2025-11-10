@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-white mb-8">Admin Dashboard</h1>

    <!-- Analytics Overview -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-8">
        <!-- Total Articles -->
        <div class="bg-black rounded-lg shadow-lg p-4 sm:p-6 border border-[#3E3E3A]">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[#A1A09A] text-sm font-medium">Total Articles</p>
                    <p class="text-white text-xl sm:text-2xl font-bold">{{ \App\Models\Blog::count() }}</p>
                </div>
                <div class="p-2 sm:p-3 bg-blue-900/20 rounded-full">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
            </div>
            <div class="mt-3 sm:mt-4">
                <span class="text-green-400 text-sm font-medium">+{{ \App\Models\Blog::where('created_at', '>=', now()->subDays(30))->count() }}</span>
                <span class="text-[#A1A09A] text-sm">this month</span>
            </div>
        </div>

        <!-- Total Views -->
        <div class="bg-black rounded-lg shadow-lg p-4 sm:p-6 border border-[#3E3E3A]">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[#A1A09A] text-sm font-medium">Total Views</p>
                    <p class="text-white text-xl sm:text-2xl font-bold">{{ number_format(\App\Models\Blog::sum('views')) }}</p>
                </div>
                <div class="p-2 sm:p-3 bg-green-900/20 rounded-full">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                </div>
            </div>
            <div class="mt-3 sm:mt-4">
                <span class="text-green-400 text-sm font-medium">+{{ number_format(\App\Models\Blog::where('updated_at', '>=', now()->subDays(7))->sum('views')) }}</span>
                <span class="text-[#A1A09A] text-sm">this week</span>
            </div>
        </div>

        <!-- Total Likes -->
        <div class="bg-black rounded-lg shadow-lg p-4 sm:p-6 border border-[#3E3E3A]">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[#A1A09A] text-sm font-medium">Total Likes</p>
                    <p class="text-white text-xl sm:text-2xl font-bold">{{ number_format(\App\Models\Blog::sum('likes')) }}</p>
                </div>
                <div class="p-2 sm:p-3 bg-red-900/20 rounded-full">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                </div>
            </div>
            <div class="mt-3 sm:mt-4">
                <span class="text-green-400 text-sm font-medium">+{{ number_format(\App\Models\Blog::where('updated_at', '>=', now()->subDays(7))->sum('likes')) }}</span>
                <span class="text-[#A1A09A] text-sm">this week</span>
            </div>
        </div>

        <!-- Total Comments -->
        <div class="bg-black rounded-lg shadow-lg p-4 sm:p-6 border border-[#3E3E3A]">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[#A1A09A] text-sm font-medium">Total Comments</p>
                    <p class="text-white text-xl sm:text-2xl font-bold">{{ \App\Models\BlogComment::count() }}</p>
                </div>
                <div class="p-2 sm:p-3 bg-purple-900/20 rounded-full">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                </div>
            </div>
            <div class="mt-3 sm:mt-4">
                <span class="text-green-400 text-sm font-medium">+{{ \App\Models\BlogComment::where('created_at', '>=', now()->subDays(7))->count() }}</span>
                <span class="text-[#A1A09A] text-sm">this week</span>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 sm:gap-8 mb-8">
        <!-- Popular Articles Chart -->
        <div class="bg-black rounded-lg shadow-lg p-4 sm:p-6 border border-[#3E3E3A]">
            <h3 class="text-lg font-semibold text-white mb-4">Most Popular Articles</h3>
            <div class="space-y-3 sm:space-y-4">
                @foreach(\App\Models\Blog::orderBy('views', 'desc')->take(5)->get() as $blog)
                    <div class="flex items-center justify-between">
                        <div class="flex-1 min-w-0">
                            <p class="text-white text-sm font-medium truncate">{{ $blog->title }}</p>
                            <p class="text-[#A1A09A] text-xs">{{ number_format($blog->views) }} views</p>
                        </div>
                        <div class="w-12 sm:w-16 bg-[#1a1a1a] rounded-full h-2 ml-2">
                            @php
                                $maxViews = \App\Models\Blog::max('views');
                                $percentage = $maxViews > 0 ? ($blog->views / $maxViews) * 100 : 0;
                            @endphp
                            <div class="bg-blue-500 h-2 rounded-full" style="width: {{ $percentage }}%"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="bg-black rounded-lg shadow-lg p-4 sm:p-6 border border-[#3E3E3A]">
            <h3 class="text-lg font-semibold text-white mb-4">Recent Activity</h3>
            <div class="space-y-3 sm:space-y-4">
                @foreach(\App\Models\Blog::orderBy('updated_at', 'desc')->take(5)->get() as $blog)
                    <div class="flex items-center space-x-3">
                        <div class="w-2 h-2 bg-blue-500 rounded-full flex-shrink-0"></div>
                        <div class="flex-1 min-w-0">
                            <p class="text-white text-sm truncate">{{ $blog->title }}</p>
                            <p class="text-[#A1A09A] text-xs">{{ $blog->updated_at->diffForHumans() }}</p>
                        </div>
                        <span class="px-2 py-1 text-xs rounded-full flex-shrink-0
                            @if($blog->status === 'published') bg-green-900 text-green-200
                            @else bg-yellow-900 text-yellow-200 @endif">
                            {{ ucfirst($blog->status) }}
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Management Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
        <!-- Projects Card -->
        <div class="bg-black rounded-lg shadow-lg p-4 sm:p-6 border border-[#3E3E3A]">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg sm:text-xl font-semibold text-white">Projects</h2>
                <a href="{{ route('admin.projects.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-3 sm:px-4 py-2 rounded-lg text-xs sm:text-sm transition-colors">
                    Add New
                </a>
            </div>
            <p class="text-[#A1A09A] mb-4 text-sm">Manage your portfolio projects</p>
            <div class="flex items-center justify-between">
                <span class="text-white font-semibold text-sm sm:text-base">{{ \App\Models\Project::count() }} projects</span>
                <a href="{{ route('admin.projects.index') }}" class="text-blue-400 hover:text-blue-300 transition-colors text-sm">
                    View all →
                </a>
            </div>
        </div>

        <!-- Skills Card -->
        <div class="bg-black rounded-lg shadow-lg p-4 sm:p-6 border border-[#3E3E3A]">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg sm:text-xl font-semibold text-white">Skills</h2>
                <a href="{{ route('admin.skills.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-3 sm:px-4 py-2 rounded-lg text-xs sm:text-sm transition-colors">
                    Add New
                </a>
            </div>
            <p class="text-[#A1A09A] mb-4 text-sm">Manage your skills and expertise</p>
            <div class="flex items-center justify-between">
                <span class="text-white font-semibold text-sm sm:text-base">{{ \App\Models\Skill::count() }} skills</span>
                <a href="{{ route('admin.skills.index') }}" class="text-blue-400 hover:text-blue-300 transition-colors text-sm">
                    View all →
                </a>
            </div>
        </div>

        <!-- Resume Card -->
        <div class="bg-black rounded-lg shadow-lg p-4 sm:p-6 border border-[#3E3E3A]">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg sm:text-xl font-semibold text-white">Resume</h2>
                <a href="{{ route('admin.resume.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-3 sm:px-4 py-2 rounded-lg text-xs sm:text-sm transition-colors">
                    Add New
                </a>
            </div>
            <p class="text-[#A1A09A] mb-4 text-sm">Manage your experience, education, and certifications</p>
            <div class="flex items-center justify-between">
                <span class="text-white font-semibold text-sm sm:text-base">{{ \App\Models\ResumeItem::count() }} items</span>
                <a href="{{ route('admin.resume.index') }}" class="text-blue-400 hover:text-blue-300 transition-colors text-sm">
                    View all →
                </a>
            </div>
        </div>

        <!-- Blog Management Card -->
        <div class="bg-black rounded-lg shadow-lg p-4 sm:p-6 border border-[#3E3E3A]">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg sm:text-xl font-semibold text-white">Blog</h2>
                <a href="{{ route('admin.blogs.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-3 sm:px-4 py-2 rounded-lg text-xs sm:text-sm transition-colors">
                    Add New
                </a>
            </div>
            <p class="text-[#A1A09A] mb-4 text-sm">Manage your blog posts and content</p>
            <div class="flex items-center justify-between">
                <span class="text-white font-semibold text-sm sm:text-base">{{ \App\Models\Blog::count() }} posts</span>
                <a href="{{ route('admin.blogs.index') }}" class="text-blue-400 hover:text-blue-300 transition-colors text-sm">
                    View all →
                </a>
            </div>
        </div>
    </div>
</div>
@endsection 