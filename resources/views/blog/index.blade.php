@extends('blog.layout')

@section('title', 'Blog - Grandkojo')
@section('meta_description', 'Read insightful articles about web development, Laravel, and modern programming practices.')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Hero Section -->
    <div class="text-center mb-16">
        <h1 class="text-4xl md:text-6xl font-bold text-white mb-6">
            Blog
        </h1>
        <p class="text-xl text-white max-w-2xl mx-auto leading-relaxed">
            Insights, tutorials, and thoughts on web development, Laravel, and modern programming practices.
        </p>
    </div>

    <!-- User Identification Section -->
    @if(!session('blog_user_name'))
        <div class="max-w-2xl mx-auto mb-12">
            <div class="bg-black rounded-lg shadow-sm border border-[#3E3E3A] p-6">
                <h2 class="text-lg font-semibold text-white mb-4">
                    💬 Join the conversation
                </h2>
                <p class="text-white mb-6">
                    Share your name and email to comment on blog posts and engage with the community.
                </p>
                
                <form action="{{ route('blog.identify') }}" method="POST" class="space-y-4">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-white mb-2">
                                Name
                            </label>
                            <input type="text" name="name" id="name" required
                                class="w-full px-4 py-2 border border-[#3E3E3A] rounded-lg bg-black text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-white mb-2">
                                Email
                            </label>
                            <input type="email" name="email" id="email" required
                                class="w-full px-4 py-2 border border-[#3E3E3A] rounded-lg bg-black text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>
                    <button type="submit" 
                        class="px-6 py-2 bg-white text-black rounded-lg hover:bg-gray-200 transition-colors font-medium">
                        Get Started
                    </button>
                </form>
            </div>
        </div>
    @endif

    <!-- Blog Posts Grid -->
    <div class="max-w-6xl mx-auto">
        @if($blogs->count() > 0)
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($blogs as $blog)
                    <article class="bg-black rounded-lg shadow-sm border border-[#3E3E3A] overflow-hidden hover:shadow-md transition-shadow">
                        @if($blog->featured_image)
                            <div class="aspect-video bg-black">
                                <img src="{{ $blog->featured_image_url }}" alt="{{ $blog->title }}" class="w-full h-full object-cover">
                            </div>
                        @endif
                        <div class="p-6">
                            <!-- Tags -->
                            @if($blog->meta_tags && count($blog->meta_tags) > 0)
                                <div class="flex flex-wrap gap-2 mb-4">
                                    @foreach(array_slice($blog->meta_tags, 0, 3) as $tag)
                                        <span class="px-2 py-1 text-xs bg-black text-white rounded-full border border-[#3E3E3A]">
                                            {{ $tag }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif

                            <!-- Title -->
                            <h2 class="text-xl font-bold text-white mb-3 leading-tight">
                                <a href="{{ route('blog.show', $blog->slug) }}" class="hover:text-blue-400 transition-colors">
                                    {{ $blog->title }}
                                </a>
                            </h2>

                            <!-- Excerpt -->
                            @if($blog->excerpt)
                                <p class="text-white text-sm mb-4 line-clamp-3">
                                    {{ $blog->excerpt }}
                                </p>
                            @endif

                            <!-- Meta Information -->
                            <div class="flex items-center justify-between text-sm text-white">
                                <div class="flex items-center space-x-4">
                                    <span class="flex items-center space-x-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <span>{{ $blog->published_at->format('M j, Y') }}</span>
                                    </span>
                                    <span class="flex items-center space-x-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>{{ $blog->minutes_read }} min read</span>
                                    </span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <span class="flex items-center space-x-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        <span>{{ number_format($blog->views) }}</span>
                                    </span>
                                    <span class="flex items-center space-x-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                        </svg>
                                        <span>{{ $blog->likes }}</span>
                                    </span>
                                </div>
                            </div>

                            <!-- Read More Link -->
                            <div class="mt-4 pt-4 border-t border-[#3E3E3A]">
                                <a href="{{ route('blog.show', $blog->slug) }}" 
                                   class="text-white hover:text-blue-400 font-medium text-sm transition-colors">
                                    Read more →
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($blogs->hasPages())
                <div class="mt-12 flex justify-center">
                    {{ $blogs->links() }}
                </div>
            @endif
        @else
            <!-- Empty State -->
            <div class="text-center py-16">
                <svg class="w-16 h-16 text-white mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
                <h3 class="text-xl font-semibold text-white mb-2">No blog posts yet</h3>
                <p class="text-white">
                    Check back soon for new articles and tutorials!
                </p>
            </div>
        @endif
    </div>

    <!-- Newsletter Signup -->
    <div class="max-w-4xl mx-auto mt-16">
        <div class="bg-black rounded-lg border border-[#3E3E3A] p-8 text-center">
            <h2 class="text-2xl font-bold text-white mb-4">
                Stay Updated
            </h2>
            <p class="text-white mb-6">
                Get notified when new articles are published. No spam, unsubscribe at any time.
            </p>
            <div class="max-w-md mx-auto">
                <div class="flex space-x-3">
                    <input type="email" placeholder="Enter your email" 
                           class="flex-1 px-4 py-2 border border-[#3E3E3A] rounded-lg bg-black text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <button class="px-6 py-2 bg-white text-black rounded-lg hover:bg-gray-200 transition-colors font-medium">
                        Subscribe
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@if(session('success'))
<div id="success-message" class="fixed bottom-4 right-4 bg-white text-black px-6 py-3 rounded-lg shadow-lg z-50">
    {{ session('success') }}
</div>
<script>
    setTimeout(() => {
        document.getElementById('success-message').style.display = 'none';
    }, 3000);
</script>
@endif
@endsection 
