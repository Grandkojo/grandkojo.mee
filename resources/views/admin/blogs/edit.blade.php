@extends('layouts.admin')

@section('title', 'Edit Blog Post')

@push('styles')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<style>
    .ql-editor {
        min-height: 300px;
        color: #1b1b18;
    }
    .dark .ql-editor {
        color: #EDEDEC;
    }
    .ql-toolbar {
        border-color: #3E3E3A;
    }
    .ql-container {
        border-color: #3E3E3A;
    }
</style>
@endpush

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-[#1b1b18] dark:text-[#EDEDEC]">Edit Blog Post</h1>
        <a href="{{ route('admin.blogs.index') }}" 
            class="text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">
            ← Back to Blog Management
        </a>
    </div>

    <form action="{{ route('admin.blogs.update', $blog) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2">
                        Title *
                    </label>
                    <input type="text" name="title" id="title" value="{{ old('title', $blog->title) }}" required
                        class="w-full px-4 py-2 border border-[#3E3E3A] dark:border-[#3E3E3A] rounded-lg bg-white dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] focus:ring-2 focus:ring-[#706f6c] dark:focus:ring-[#A1A09A] focus:border-transparent"
                        placeholder="Enter blog post title">
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Excerpt -->
                <div>
                    <label for="excerpt" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2">
                        Excerpt
                    </label>
                    <textarea name="excerpt" id="excerpt" rows="3"
                        class="w-full px-4 py-2 border border-[#3E3E3A] dark:border-[#3E3E3A] rounded-lg bg-white dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] focus:ring-2 focus:ring-[#706f6c] dark:focus:ring-[#A1A09A] focus:border-transparent"
                        placeholder="Brief description of the blog post">{{ old('excerpt', $blog->excerpt) }}</textarea>
                    @error('excerpt')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Content -->
                <div>
                    <label for="content" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2">
                        Content *
                    </label>
                    <div id="editor" class="border border-[#3E3E3A] dark:border-[#3E3E3A] rounded-lg bg-white dark:bg-[#0a0a0a]">
                        {!! old('content', $blog->content) !!}
                    </div>
                    <input type="hidden" name="content" id="content-input" value="{{ old('content', $blog->content) }}">
                    @error('content')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Featured Image -->
                <div>
                    <label for="featured_image" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2">
                        Featured Image
                    </label>
                    
                    @if($blog->featured_image)
                        <div class="mb-4">
                            <img src="{{ $blog->featured_image_url }}" alt="Current featured image" class="w-32 h-32 object-cover rounded-lg border border-[#3E3E3A] dark:border-[#3E3E3A]">
                            <p class="text-sm text-[#706f6c] dark:text-[#A1A09A] mt-2">Current image</p>
                        </div>
                    @endif
                    
                    <input type="file" name="featured_image" id="featured_image" accept="image/*"
                        class="w-full px-4 py-2 border border-[#3E3E3A] dark:border-[#3E3E3A] rounded-lg bg-white dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] focus:ring-2 focus:ring-[#706f6c] dark:focus:ring-[#A1A09A] focus:border-transparent">
                    <p class="text-xs text-[#706f6c] dark:text-[#A1A09A] mt-1">Leave empty to keep current image</p>
                    @error('featured_image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Status -->
                <div class="bg-white dark:bg-[#1a1a1a] rounded-lg shadow-sm border border-[#3E3E3A] dark:border-[#3E3E3A] p-6">
                    <h3 class="text-lg font-semibold text-[#1b1b18] dark:text-[#EDEDEC] mb-4">Publishing</h3>
                    
                    <div class="space-y-4">
                        <div>
                            <label for="status" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2">
                                Status
                            </label>
                            <select name="status" id="status" required
                                class="w-full px-4 py-2 border border-[#3E3E3A] dark:border-[#3E3E3A] rounded-lg bg-white dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] focus:ring-2 focus:ring-[#706f6c] dark:focus:ring-[#A1A09A] focus:border-transparent">
                                <option value="draft" {{ old('status', $blog->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="published" {{ old('status', $blog->status) === 'published' ? 'selected' : '' }}>Published</option>
                            </select>
                        </div>

                        <div>
                            <label for="published_at" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2">
                                Publish Date
                            </label>
                            <input type="datetime-local" name="published_at" id="published_at" 
                                value="{{ old('published_at', $blog->published_at ? $blog->published_at->format('Y-m-d\TH:i') : '') }}"
                                class="w-full px-4 py-2 border border-[#3E3E3A] dark:border-[#3E3E3A] rounded-lg bg-white dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] focus:ring-2 focus:ring-[#706f6c] dark:focus:ring-[#A1A09A] focus:border-transparent">
                        </div>

                        <div>
                            <label for="minutes_read" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2">
                                Reading Time (minutes)
                            </label>
                            <input type="number" name="minutes_read" id="minutes_read" value="{{ old('minutes_read', $blog->minutes_read) }}" min="1" max="60" required
                                class="w-full px-4 py-2 border border-[#3E3E3A] dark:border-[#3E3E3A] rounded-lg bg-white dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] focus:ring-2 focus:ring-[#706f6c] dark:focus:ring-[#A1A09A] focus:border-transparent">
                        </div>
                    </div>
                </div>

                <!-- SEO -->
                <div class="bg-white dark:bg-[#1a1a1a] rounded-lg shadow-sm border border-[#3E3E3A] dark:border-[#3E3E3A] p-6">
                    <h3 class="text-lg font-semibold text-[#1b1b18] dark:text-[#EDEDEC] mb-4">SEO</h3>
                    
                    <div class="space-y-4">
                        <div>
                            <label for="meta_description" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2">
                                Meta Description
                            </label>
                            <textarea name="meta_description" id="meta_description" rows="3"
                                class="w-full px-4 py-2 border border-[#3E3E3A] dark:border-[#3E3E3A] rounded-lg bg-white dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] focus:ring-2 focus:ring-[#706f6c] dark:focus:ring-[#A1A09A] focus:border-transparent"
                                placeholder="Brief description for search engines">{{ old('meta_description', $blog->meta_description) }}</textarea>
                        </div>

                        <div>
                            <label for="meta_tags" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2">
                                Tags
                            </label>
                            <input type="text" name="meta_tags" id="meta_tags" 
                                value="{{ old('meta_tags', $blog->meta_tags ? implode(', ', $blog->meta_tags) : '') }}"
                                class="w-full px-4 py-2 border border-[#3E3E3A] dark:border-[#3E3E3A] rounded-lg bg-white dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] focus:ring-2 focus:ring-[#706f6c] dark:focus:ring-[#A1A09A] focus:border-transparent"
                                placeholder="tag1, tag2, tag3">
                            <p class="text-xs text-[#706f6c] dark:text-[#A1A09A] mt-1">Separate tags with commas</p>
                        </div>
                    </div>
                </div>

                <!-- Statistics -->
                <div class="bg-white dark:bg-[#1a1a1a] rounded-lg shadow-sm border border-[#3E3E3A] dark:border-[#3E3E3A] p-6">
                    <h3 class="text-lg font-semibold text-[#1b1b18] dark:text-[#EDEDEC] mb-4">Statistics</h3>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-[#1b1b18] dark:text-[#EDEDEC]">
                                {{ number_format($blog->views) }}
                            </div>
                            <div class="text-sm text-[#706f6c] dark:text-[#A1A09A]">Views</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-[#1b1b18] dark:text-[#EDEDEC]">
                                {{ number_format($blog->likes) }}
                            </div>
                            <div class="text-sm text-[#706f6c] dark:text-[#A1A09A]">Likes</div>
                        </div>
                    </div>
                    
                    <div class="mt-4 pt-4 border-t border-[#3E3E3A] dark:border-[#3E3E3A]">
                        <div class="text-sm text-[#706f6c] dark:text-[#A1A09A]">
                            <div class="flex justify-between">
                                <span>Created:</span>
                                <span>{{ $blog->created_at->format('M j, Y') }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Updated:</span>
                                <span>{{ $blog->updated_at->format('M j, Y') }}</span>
                            </div>
                            @if($blog->published_at)
                                <div class="flex justify-between">
                                    <span>Published:</span>
                                    <span>{{ $blog->published_at->format('M j, Y') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="bg-white dark:bg-[#1a1a1a] rounded-lg shadow-sm border border-[#3E3E3A] dark:border-[#3E3E3A] p-6">
                    <h3 class="text-lg font-semibold text-[#1b1b18] dark:text-[#EDEDEC] mb-4">Actions</h3>
                    
                    <div class="space-y-3">
                        <button type="submit" 
                            class="w-full px-4 py-2 bg-[#1b1b18] dark:bg-[#EDEDEC] text-[#FDFDFC] dark:text-[#0a0a0a] rounded-lg hover:bg-[#706f6c] dark:hover:bg-[#A1A09A] transition-colors font-medium">
                            Update Post
                        </button>
                        
                        <button type="button" id="preview-button"
                            class="w-full px-4 py-2 border border-[#3E3E3A] dark:border-[#3E3E3A] text-[#706f6c] dark:text-[#A1A09A] rounded-lg hover:bg-[#1a1a1a] dark:hover:bg-[#0a0a0a] transition-colors">
                            Preview
                        </button>
                        
                        <a href="{{ route('blog.show', $blog->slug) }}" target="_blank"
                            class="w-full px-4 py-2 border border-[#3E3E3A] dark:border-[#3E3E3A] text-[#706f6c] dark:text-[#A1A09A] rounded-lg hover:bg-[#1a1a1a] dark:hover:bg-[#0a0a0a] transition-colors text-center block">
                            View Live
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Preview Modal -->
<div id="preview-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white dark:bg-[#1a1a1a] rounded-lg shadow-xl max-w-4xl w-full max-h-[90vh] overflow-y-auto">
            <div class="flex justify-between items-center p-6 border-b border-[#3E3E3A] dark:border-[#3E3E3A]">
                <h3 class="text-lg font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">Preview</h3>
                <button id="close-preview" class="text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC]">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div id="preview-content" class="p-6">
                <!-- Preview content will be loaded here -->
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
<script>
    // Initialize Quill editor
    var quill = new Quill('#editor', {
        theme: 'snow',
        modules: {
            toolbar: [
                [{ 'header': [1, 2, 3, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                [{ 'color': [] }, { 'background': [] }],
                ['link', 'image', 'video', 'code-block'],
                ['clean']
            ]
        }
    });

    // Update hidden input when content changes
    quill.on('text-change', function() {
        document.getElementById('content-input').value = quill.root.innerHTML;
    });

    // Preview functionality
    document.getElementById('preview-button').addEventListener('click', function() {
        const formData = new FormData();
        formData.append('title', document.getElementById('title').value);
        formData.append('excerpt', document.getElementById('excerpt').value);
        formData.append('content', quill.root.innerHTML);
        formData.append('minutes_read', document.getElementById('minutes_read').value);
        formData.append('meta_tags', document.getElementById('meta_tags').value);
        formData.append('meta_description', document.getElementById('meta_description').value);
        formData.append('_token', '{{ csrf_token() }}');

        fetch('{{ route("admin.blogs.preview") }}', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(html => {
            document.getElementById('preview-content').innerHTML = html;
            document.getElementById('preview-modal').classList.remove('hidden');
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error loading preview');
        });
    });

    document.getElementById('close-preview').addEventListener('click', function() {
        document.getElementById('preview-modal').classList.add('hidden');
    });

    // Close modal when clicking outside
    document.getElementById('preview-modal').addEventListener('click', function(e) {
        if (e.target === this) {
            this.classList.add('hidden');
        }
    });
</script>
@endpush 