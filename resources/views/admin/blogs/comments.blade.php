@extends('layouts.admin')

@section('title', 'Comments Management')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-[#1b1b18] dark:text-[#EDEDEC]">Comments Management</h1>
        <a href="{{ route('admin.blogs.index') }}" 
            class="text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">
            ← Back to Blog Management
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 dark:bg-green-900 border border-green-400 dark:border-green-700 text-green-700 dark:text-green-300 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <!-- Filter Tabs -->
    <div class="mb-6">
        <div class="border-b border-[#3E3E3A] dark:border-[#3E3E3A]">
            <nav class="-mb-px flex space-x-8">
                <a href="{{ request()->fullUrlWithQuery(['status' => '']) }}" 
                    class="py-2 px-1 border-b-2 font-medium text-sm {{ !request('status') ? 'border-[#1b1b18] dark:border-[#EDEDEC] text-[#1b1b18] dark:text-[#EDEDEC]' : 'border-transparent text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] hover:border-[#706f6c] dark:hover:border-[#A1A09A]' }}">
                    All ({{ $comments->total() }})
                </a>
                <a href="{{ request()->fullUrlWithQuery(['status' => 'pending']) }}" 
                    class="py-2 px-1 border-b-2 font-medium text-sm {{ request('status') === 'pending' ? 'border-[#1b1b18] dark:border-[#EDEDEC] text-[#1b1b18] dark:text-[#EDEDEC]' : 'border-transparent text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] hover:border-[#706f6c] dark:hover:border-[#A1A09A]' }}">
                    Pending ({{ $comments->where('status', 'pending')->count() }})
                </a>
                <a href="{{ request()->fullUrlWithQuery(['status' => 'approved']) }}" 
                    class="py-2 px-1 border-b-2 font-medium text-sm {{ request('status') === 'approved' ? 'border-[#1b1b18] dark:border-[#EDEDEC] text-[#1b1b18] dark:text-[#EDEDEC]' : 'border-transparent text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] hover:border-[#706f6c] dark:hover:border-[#A1A09A]' }}">
                    Approved ({{ $comments->where('status', 'approved')->count() }})
                </a>
                <a href="{{ request()->fullUrlWithQuery(['status' => 'spam']) }}" 
                    class="py-2 px-1 border-b-2 font-medium text-sm {{ request('status') === 'spam' ? 'border-[#1b1b18] dark:border-[#EDEDEC] text-[#1b1b18] dark:text-[#EDEDEC]' : 'border-transparent text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] hover:border-[#706f6c] dark:hover:border-[#A1A09A]' }}">
                    Spam ({{ $comments->where('status', 'spam')->count() }})
                </a>
            </nav>
        </div>
    </div>

    <div class="bg-white dark:bg-[#1a1a1a] rounded-lg shadow-sm border border-[#3E3E3A] dark:border-[#3E3E3A] overflow-hidden">
        @if($comments->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-[#3E3E3A] dark:divide-[#3E3E3A]">
                    <thead class="bg-[#f5f5f5] dark:bg-[#0a0a0a]">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-wider">
                                Comment
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-wider">
                                Author
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-wider">
                                Post
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-wider">
                                Status
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-wider">
                                Date
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-[#1a1a1a] divide-y divide-[#3E3E3A] dark:divide-[#3E3E3A]">
                        @foreach($comments as $comment)
                            <tr class="hover:bg-[#f5f5f5] dark:hover:bg-[#0a0a0a] transition-colors">
                                <td class="px-6 py-4">
                                    <div class="max-w-md">
                                        <p class="text-sm text-[#1b1b18] dark:text-[#EDEDEC] mb-2">
                                            {{ Str::limit($comment->content, 100) }}
                                        </p>
                                        @if($comment->parent)
                                            <div class="text-xs text-[#706f6c] dark:text-[#A1A09A] bg-[#f5f5f5] dark:bg-[#0a0a0a] p-2 rounded">
                                                <strong>Reply to:</strong> {{ Str::limit($comment->parent->content, 50) }}
                                            </div>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm">
                                        <div class="font-medium text-[#1b1b18] dark:text-[#EDEDEC]">
                                            {{ $comment->name }}
                                            @if($comment->is_admin_reply)
                                                <span class="ml-2 px-2 py-1 bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 text-xs rounded-full">Admin</span>
                                            @endif
                                        </div>
                                        <div class="text-[#706f6c] dark:text-[#A1A09A]">{{ $comment->email }}</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm">
                                        <a href="{{ route('blog.show', $comment->blog->slug) }}" target="_blank" 
                                            class="font-medium text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 transition-colors">
                                            {{ Str::limit($comment->blog->title, 40) }}
                                        </a>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($comment->status === 'approved')
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200">
                                            Approved
                                        </span>
                                    @elseif($comment->status === 'pending')
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200">
                                            Pending
                                        </span>
                                    @else
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200">
                                            Spam
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-[#706f6c] dark:text-[#A1A09A]">
                                    {{ $comment->created_at->format('M j, Y g:i A') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        @if($comment->status === 'pending')
                                            <form action="{{ route('admin.comments.approve', $comment) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" 
                                                    class="text-green-600 dark:text-green-400 hover:text-green-800 dark:hover:text-green-300 transition-colors">
                                                    Approve
                                                </button>
                                            </form>
                                        @endif
                                        
                                        @if($comment->status !== 'spam')
                                            <form action="{{ route('admin.comments.spam', $comment) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" 
                                                    class="text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300 transition-colors">
                                                    Mark Spam
                                                </button>
                                            </form>
                                        @endif
                                        
                                        <form action="{{ route('admin.comments.destroy', $comment) }}" method="POST" class="inline" 
                                            onsubmit="return confirm('Are you sure you want to delete this comment?')">
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
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="px-6 py-12 text-center">
                <div class="text-[#706f6c] dark:text-[#A1A09A]">
                    <svg class="mx-auto h-12 w-12 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    <h3 class="text-lg font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2">No comments found</h3>
                    <p>There are no comments matching your current filter.</p>
                </div>
            </div>
        @endif
    </div>

    @if($comments->hasPages())
        <div class="mt-6">
            {{ $comments->links() }}
        </div>
    @endif

    <!-- Bulk Actions -->
    @if($comments->count() > 0)
        <div class="mt-8 bg-white dark:bg-[#1a1a1a] rounded-lg shadow-sm border border-[#3E3E3A] dark:border-[#3E3E3A] p-6">
            <h3 class="text-lg font-semibold text-[#1b1b18] dark:text-[#EDEDEC] mb-4">Bulk Actions</h3>
            <div class="flex space-x-4">
                <button type="button" onclick="bulkAction('approve')" 
                    class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                    Approve Selected
                </button>
                <button type="button" onclick="bulkAction('spam')" 
                    class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                    Mark as Spam
                </button>
                <button type="button" onclick="bulkAction('delete')" 
                    class="px-4 py-2 bg-red-800 text-white rounded-lg hover:bg-red-900 transition-colors">
                    Delete Selected
                </button>
            </div>
        </div>
    @endif
</div>

<!-- Reply Modal -->
<div id="reply-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white dark:bg-[#1a1a1a] rounded-lg shadow-xl max-w-md w-full">
            <div class="flex justify-between items-center p-6 border-b border-[#3E3E3A] dark:border-[#3E3E3A]">
                <h3 class="text-lg font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">Reply to Comment</h3>
                <button id="close-reply-modal" class="text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC]">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <form id="reply-form" method="POST" class="p-6">
                @csrf
                <div class="mb-4">
                    <label for="reply-content" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2">
                        Your Reply
                    </label>
                    <textarea name="content" id="reply-content" rows="4" required
                        class="w-full px-4 py-2 border border-[#3E3E3A] dark:border-[#3E3E3A] rounded-lg bg-white dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] focus:ring-2 focus:ring-[#706f6c] dark:focus:ring-[#A1A09A] focus:border-transparent"
                        placeholder="Write your reply..."></textarea>
                </div>
                <div class="flex justify-end space-x-3">
                    <button type="button" id="cancel-reply" 
                        class="px-4 py-2 border border-[#3E3E3A] dark:border-[#3E3E3A] text-[#706f6c] dark:text-[#A1A09A] rounded-lg hover:bg-[#1a1a1a] dark:hover:bg-[#0a0a0a] transition-colors">
                        Cancel
                    </button>
                    <button type="submit" 
                        class="px-4 py-2 bg-[#1b1b18] dark:bg-[#EDEDEC] text-[#FDFDFC] dark:text-[#0a0a0a] rounded-lg hover:bg-[#706f6c] dark:hover:bg-[#A1A09A] transition-colors">
                        Post Reply
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function bulkAction(action) {
        const selectedComments = document.querySelectorAll('input[name="selected_comments[]"]:checked');
        if (selectedComments.length === 0) {
            alert('Please select at least one comment.');
            return;
        }

        const commentIds = Array.from(selectedComments).map(cb => cb.value);
        const confirmMessage = {
            'approve': 'Are you sure you want to approve the selected comments?',
            'spam': 'Are you sure you want to mark the selected comments as spam?',
            'delete': 'Are you sure you want to delete the selected comments? This action cannot be undone.'
        };

        if (confirm(confirmMessage[action])) {
            // Here you would implement the bulk action logic
            // For now, we'll just show an alert
            alert(`${action} action would be performed on ${commentIds.length} comments.`);
        }
    }

    function showReplyModal(commentId) {
        const modal = document.getElementById('reply-modal');
        const form = document.getElementById('reply-form');
        form.action = `/admin/comments/${commentId}/reply`;
        modal.classList.remove('hidden');
    }

    document.getElementById('close-reply-modal').addEventListener('click', function() {
        document.getElementById('reply-modal').classList.add('hidden');
    });

    document.getElementById('cancel-reply').addEventListener('click', function() {
        document.getElementById('reply-modal').classList.add('hidden');
    });

    // Close modal when clicking outside
    document.getElementById('reply-modal').addEventListener('click', function(e) {
        if (e.target === this) {
            this.classList.add('hidden');
        }
    });
</script>
@endpush
@endsection 