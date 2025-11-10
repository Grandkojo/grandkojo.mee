@extends('blog.layout')

@section('title', $blog->title . ' - Grandkojo')
@section('meta_description', $blog->meta_description ?: $blog->excerpt)

@section('content')
<div class="container mx-auto px-4 py-8 max-w-4xl" x-data="{ liked: {{ $hasLiked ? 'true' : 'false' }}, likes: {{ $blog->likes }} }">
    
    <!-- Breadcrumb -->
    <nav class="flex items-center space-x-2 text-sm text-white mb-8">
        <a href="{{ route('portfolio') }}" class="hover:text-blue-400">Home</a>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
        <a href="{{ route('blog.index') }}" class="hover:text-blue-400">Blog</a>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
        <span class="text-white">{{ $blog->title }}</span>
    </nav>

    <!-- Article Header -->
    <header class="mb-12">
        <!-- Tags -->
        @if($blog->meta_tags && count($blog->meta_tags) > 0)
            <div class="flex flex-wrap gap-2 mb-4">
                @foreach($blog->meta_tags as $tag)
                    <span class="px-3 py-1 text-sm bg-black text-white rounded-full border border-[#3E3E3A]">
                        {{ $tag }}
                    </span>
                @endforeach
            </div>
        @endif

        <!-- Title -->
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 leading-tight">
            {{ $blog->title }}
        </h1>

        <!-- Description -->
        @if($blog->excerpt)
            <p class="text-xl text-white mb-6 leading-relaxed">
                {{ $blog->excerpt }}
            </p>
        @endif

        <!-- Author and Meta Info -->
        <div class="flex items-center justify-between flex-wrap gap-4">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-black rounded-full flex items-center justify-center border border-[#3E3E3A]">
                    <span class="text-white font-semibold">GK</span>
                </div>
                <div>
                    <p class="font-semibold text-white">Ernest Kojo Owusu Essien</p>
                    <p class="text-sm text-white">{{ $blog->published_at->diffForHumans() }}</p>
                </div>
            </div>

            <div class="flex items-center space-x-6 text-sm text-white">
                <div class="flex items-center space-x-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                    <span>{{ number_format($blog->views) }}</span>
                </div>
                <div class="flex items-center space-x-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>{{ $blog->minutes_read }} min read</span>
                </div>
                <div class="flex items-center space-x-2">
                    <button id="like-button" 
                            class="flex items-center space-x-1 px-3 py-1 rounded-lg transition-colors"
                            :class="liked ? 'text-red-400 bg-red-900/20' : 'text-white hover:bg-black'">
                        <svg class="w-4 h-4" :class="liked ? 'fill-current' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                        <span id="like-count" x-text="likes">{{ $blog->likes }}</span>
                    </button>
                    <button class="p-2 text-white hover:bg-black rounded-lg transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                        </svg>
                    </button>
                    <button class="p-2 text-white hover:bg-black rounded-lg transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Featured Image -->
    @if($blog->featured_image)
        <div class="mb-8 rounded-lg overflow-hidden">
            <img src="{{ $blog->featured_image_url }}" alt="{{ $blog->title }}" class="w-full h-auto">
        </div>
    @endif

    <!-- Article Content -->
    <article class="prose prose-lg max-w-none prose-headings:text-white prose-p:text-white prose-strong:text-white prose-a:text-blue-400 prose-blockquote:border-l-[#3E3E3A] prose-code:bg-black prose-code:text-white prose-pre:bg-black prose-pre:text-white">
        {!! $blog->content !!}
    </article>

    <!-- Article Footer -->
    <footer class="flex items-center justify-between pt-8 border-t border-[#3E3E3A]">
        <div class="flex items-center space-x-4">
            <button id="like-button-footer" 
                    class="flex items-center space-x-2 px-4 py-2 border rounded-lg transition-colors"
                    :class="liked ? 'text-red-400 border-red-900/20 bg-red-900/20' : 'text-white border-[#3E3E3A] hover:bg-black'">
                <svg class="w-4 h-4" :class="liked ? 'fill-current' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                </svg>
                <span id="like-count-footer" x-text="likes + ' likes'">{{ $blog->likes }} likes</span>
            </button>
            <button class="flex items-center space-x-2 px-4 py-2 border border-[#3E3E3A] rounded-lg text-white hover:bg-black transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                </svg>
                <span>Share</span>
            </button>
        </div>
        <div class="text-sm text-white">
            Published {{ $blog->published_at->diffForHumans() }}
        </div>
    </footer>

    <!-- Comments Section -->
    <section class="mt-16 pt-8 border-t border-[#3E3E3A]">
        <h2 class="text-2xl font-bold text-white mb-8">
            Comments ({{ $blog->approvedComments->count() }})
        </h2>

        <!-- User Identification for Comments -->
        @if(!session('blog_user_name'))
            <div class="bg-black rounded-lg shadow-sm border border-[#3E3E3A] p-6 mb-8">
                <h3 class="text-lg font-semibold text-white mb-4">
                    💬 Join the conversation
                </h3>
                <p class="text-white mb-6">
                    Share your name and email to comment on this post.
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
        @else
            <!-- Comment Form -->
            <div class="bg-black rounded-lg shadow-sm border border-[#3E3E3A] p-6 mb-8">
                <h3 class="text-lg font-semibold text-white mb-4">
                    💬 Add a comment
                </h3>
                
                <form action="{{ route('blog.comment', $blog->slug) }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="content" class="block text-sm font-medium text-white mb-2">
                            Comment
                        </label>
                        <textarea name="content" id="content" rows="4" required
                            class="w-full px-4 py-2 border border-[#3E3E3A] rounded-lg bg-black text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            placeholder="Share your thoughts..."></textarea>
                    </div>
                    
                    <div>
                        <label for="captcha" class="block text-sm font-medium text-white mb-2">
                            Captcha: Type "grandkojo" to prove you're human
                        </label>
                        <input type="text" name="captcha" id="captcha" required
                            class="w-full px-4 py-2 border border-[#3E3E3A] rounded-lg bg-black text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            placeholder="grandkojo">
                        @error('captcha')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <p class="text-sm text-white">
                            Commenting as <span class="font-medium text-white">{{ session('blog_user_name') }}</span>
                        </p>
                        <button type="submit" 
                            class="px-6 py-2 bg-white text-black rounded-lg hover:bg-gray-200 transition-colors font-medium">
                            Post Comment
                        </button>
                    </div>
                </form>
            </div>
        @endif

        <!-- Comments List -->
        <div class="space-y-6">
            @forelse($blog->approvedComments as $comment)
                <div class="bg-black rounded-lg shadow-sm border border-[#3E3E3A] p-6">
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-black rounded-full flex items-center justify-center border border-[#3E3E3A]">
                                <span class="text-white font-medium text-sm">
                                    {{ strtoupper(substr($comment->name, 0, 1)) }}
                                </span>
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center space-x-2 mb-2">
                                <h4 class="text-sm font-medium text-white">
                                    {{ $comment->name }}
                                    @if($comment->is_admin_reply)
                                        <span class="ml-2 px-2 py-1 bg-blue-900 text-blue-200 text-xs rounded-full">Admin</span>
                                    @endif
                                </h4>
                                <span class="text-xs text-white">
                                    {{ $comment->created_at->diffForHumans() }}
                                </span>
                            </div>
                            <p class="text-white leading-relaxed">
                                {{ $comment->content }}
                            </p>
                            
                            <!-- Reply Button -->
                            @if(session('blog_user_name'))
                                <button onclick="showReplyForm({{ $comment->id }})" class="mt-3 text-sm text-white hover:text-blue-400 transition-colors">
                                    Reply
                                </button>
                                
                                <!-- Reply Form -->
                                <div id="reply-form-{{ $comment->id }}" class="hidden mt-4">
                                    <form action="{{ route('blog.comment', $blog->slug) }}" method="POST" class="space-y-4">
                                        @csrf
                                        <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                        <div>
                                            <textarea name="content" rows="3" required
                                                class="w-full px-4 py-2 border border-[#3E3E3A] rounded-lg bg-black text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                placeholder="Write a reply..."></textarea>
                                        </div>
                                        <div>
                                            <input type="text" name="captcha" required
                                                class="w-full px-4 py-2 border border-[#3E3E3A] rounded-lg bg-black text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                placeholder="Type 'grandkojo' to prove you're human">
                                        </div>
                                        <div class="flex space-x-3">
                                            <button type="submit" 
                                                class="px-4 py-2 bg-white text-black rounded-lg hover:bg-gray-200 transition-colors text-sm">
                                                Post Reply
                                            </button>
                                            <button type="button" onclick="hideReplyForm({{ $comment->id }})"
                                                class="px-4 py-2 border border-[#3E3E3A] text-white rounded-lg hover:bg-black transition-colors text-sm">
                                                Cancel
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Replies -->
                    @if($comment->replies->count() > 0)
                        <div class="mt-6 ml-14 space-y-4">
                            @foreach($comment->replies->where('status', 'approved') as $reply)
                                <div class="bg-black rounded-lg p-4 border-l-4 border-l-blue-500">
                                    <div class="flex items-center space-x-2 mb-2">
                                        <h5 class="text-sm font-medium text-white">
                                            {{ $reply->name }}
                                            @if($reply->is_admin_reply)
                                                <span class="ml-2 px-2 py-1 bg-blue-900 text-blue-200 text-xs rounded-full">Admin</span>
                                            @endif
                                        </h5>
                                        <span class="text-xs text-white">
                                            {{ $reply->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                    <p class="text-white text-sm leading-relaxed">
                                        {{ $reply->content }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @empty
                <div class="text-center py-12">
                    <svg class="w-12 h-12 text-white mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    <h3 class="text-lg font-semibold text-white mb-2">No comments yet</h3>
                    <p class="text-white">
                        Be the first to share your thoughts!
                    </p>
                </div>
            @endforelse
        </div>
    </section>

    <!-- Related Posts -->
    @if($relatedBlogs->count() > 0)
        <section class="mt-16 pt-8 border-t border-[#3E3E3A]">
            <h2 class="text-2xl font-bold text-white mb-8">
                Related Posts
            </h2>
            <div class="grid md:grid-cols-3 gap-6">
                @foreach($relatedBlogs as $relatedBlog)
                    <article class="bg-black rounded-lg shadow-sm border border-[#3E3E3A] overflow-hidden hover:shadow-md transition-shadow">
                        @if($relatedBlog->featured_image)
                            <div class="aspect-video bg-black">
                                <img src="{{ $relatedBlog->featured_image_url }}" alt="{{ $relatedBlog->title }}" class="w-full h-full object-cover">
                            </div>
                        @endif
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-white mb-2">
                                <a href="{{ route('blog.show', $relatedBlog->slug) }}" class="hover:text-blue-400 transition-colors">
                                    {{ $relatedBlog->title }}
                                </a>
                            </h3>
                            <p class="text-white text-sm mb-4 line-clamp-2">
                                {{ $relatedBlog->excerpt }}
                            </p>
                            <div class="flex items-center justify-between text-sm text-white">
                                <span>{{ $relatedBlog->published_at->format('M j, Y') }}</span>
                                <span>{{ $relatedBlog->minutes_read }} min read</span>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
    @endif
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

@push('scripts')
<script>
    // Like functionality
    document.addEventListener('DOMContentLoaded', function() {
        const likeButtons = document.querySelectorAll('#like-button, #like-button-footer');
        const likeCounts = document.querySelectorAll('#like-count, #like-count-footer');
        const slug = '{{ $blog->slug }}';
        
        // Get initial like state from server
        const hasLiked = {{ $hasLiked ? 'true' : 'false' }};
        
        // Initialize Alpine.js data with current like state
        if (window.Alpine) {
            const component = Alpine.$data(document.querySelector('[x-data]'));
            if (component) {
                component.liked = hasLiked;
            }
        }
        
        // Update visual state based on like status
        function updateLikeState(liked) {
            likeButtons.forEach(function(button) {
                if (liked) {
                    button.classList.add('text-red-400', 'bg-red-900/20');
                    if (button.classList.contains('border-[#3E3E3A]')) {
                        button.classList.remove('border-[#3E3E3A]');
                        button.classList.add('border-red-900/20');
                    }
                } else {
                    button.classList.remove('text-red-400', 'bg-red-900/20');
                    if (button.classList.contains('border-red-900/20')) {
                        button.classList.remove('border-red-900/20');
                        button.classList.add('border-[#3E3E3A]');
                    }
                }
            });
        }
        
        // Initialize visual state
        updateLikeState(hasLiked);
        
        likeButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                // Prevent multiple clicks
                if (button.disabled) return;
                button.disabled = true;
                
                fetch(`/blog/${slug}/like`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Update all like counts
                        likeCounts.forEach(function(count) {
                            if (count.id === 'like-count') {
                                count.textContent = data.likes;
                            } else if (count.id === 'like-count-footer') {
                                count.textContent = data.likes + ' likes';
                            }
                        });
                        
                        // Update visual state
                        const newLikedState = data.action === 'liked';
                        updateLikeState(newLikedState);
                        
                        // Update Alpine.js data
                        if (window.Alpine) {
                            const component = Alpine.$data(button.closest('[x-data]'));
                            if (component) {
                                component.liked = newLikedState;
                                component.likes = data.likes;
                            }
                        }
                        
                        // Show feedback message
                        const message = data.action === 'liked' ? 'Post liked!' : 'Post unliked!';
                        showFeedback(message);
                    } else {
                        alert(data.message || 'An error occurred');
                        button.disabled = false;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while processing your request.');
                    button.disabled = false;
                });
            });
        });
        
        // Show feedback message
        function showFeedback(message) {
            const feedback = document.createElement('div');
            feedback.className = 'fixed bottom-4 right-4 bg-white text-black px-4 py-2 rounded-lg shadow-lg z-50 text-sm';
            feedback.textContent = message;
            document.body.appendChild(feedback);
            
            setTimeout(() => {
                feedback.remove();
            }, 2000);
        }
    });

    // Reply form functionality
    function showReplyForm(commentId) {
        document.getElementById(`reply-form-${commentId}`).classList.remove('hidden');
    }

    function hideReplyForm(commentId) {
        document.getElementById(`reply-form-${commentId}`).classList.add('hidden');
    }
</script>
@endpush
@endsection 