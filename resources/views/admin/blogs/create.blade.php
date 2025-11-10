@extends('layouts.admin')

@section('title', 'Create Blog Post')

@push('styles')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<style>
    .ql-editor {
        min-height: 300px;
        color: #EDEDEC !important;
    }
    .ql-editor p, .ql-editor div, .ql-editor h1, .ql-editor h2, .ql-editor h3, .ql-editor h4, .ql-editor h5, .ql-editor h6 {
        color: #EDEDEC !important;
    }
    .ql-editor strong, .ql-editor b {
        color: #EDEDEC !important;
    }
    .ql-editor em, .ql-editor i {
        color: #EDEDEC !important;
    }
    .ql-editor code {
        color: #10b981 !important;
        background-color: rgba(16, 185, 129, 0.1);
        padding: 2px 4px;
        border-radius: 4px;
    }
    .ql-editor pre {
        color: #10b981 !important;
        background-color: #1f2937;
        padding: 16px;
        border-radius: 8px;
        overflow-x: auto;
    }
    .ql-toolbar {
        border-color: #3E3E3A;
    }
    .ql-container {
        border-color: #3E3E3A;
    }
    .ql-editor.ql-blank::before {
        color: #706f6c;
    }
    .dark .ql-editor.ql-blank::before {
        color: #A1A09A;
    }
    
    /* Preview styling to match seeder */
    .preview-content h1 {
        @apply text-4xl font-bold mb-6 text-slate-900 dark:text-white;
    }
    .preview-content h2 {
        @apply text-3xl font-bold mb-6 text-slate-900 dark:text-white;
    }
    .preview-content h3 {
        @apply text-2xl font-bold mb-4 text-slate-900 dark:text-white;
    }
    .preview-content h4 {
        @apply text-xl font-semibold mb-3 text-slate-900 dark:text-white;
    }
    .preview-content p {
        @apply text-slate-700 dark:text-slate-300 leading-relaxed mb-4;
    }
    .preview-content .highlight-box {
        margin-bottom: 1.5rem;
        border-left: 4px solid #10b981;
        background-color: rgba(6, 95, 70, 0.1);
        border-top-right-radius: 0.5rem;
        border-bottom-right-radius: 0.5rem;
        padding: 1rem;
    }
    .preview-content .highlight-box h2 {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
        color: #6ee7b7;
    }
    .preview-content .highlight-box p {
        color: #cbd5e1;
        line-height: 1.5;
        margin-bottom: 0;
        word-wrap: break-word;
        overflow-wrap: break-word;
        word-break: break-word;
    }
    .blog-content .highlight-box {
        margin-bottom: 1.5rem;
        border-left: 4px solid #10b981;
        background-color: rgba(6, 95, 70, 0.1);
        border-top-right-radius: 0.5rem;
        border-bottom-right-radius: 0.5rem;
        padding: 1rem;
    }
    .blog-content .highlight-box h2 {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
        color: #6ee7b7;
    }
    .blog-content .highlight-box p {
        color: #cbd5e1;
        line-height: 1.5;
        margin-bottom: 0;
    }
    
    /* Make overall content more compact */
    .blog-content h1 {
        margin-bottom: 1rem;
    }
    
    .blog-content h2 {
        margin-bottom: 0.75rem;
    }
    
    .blog-content p {
        margin-bottom: 0.75rem;
        line-height: 1.5;
        word-wrap: break-word;
        overflow-wrap: break-word;
        word-break: break-word;
    }
    
    /* Fix text wrapping for all content */
    .blog-content * {
        word-wrap: break-word;
        overflow-wrap: break-word;
        word-break: break-word;
        max-width: 100%;
        box-sizing: border-box;
    }
    
    /* Force text wrapping for specific elements */
    .blog-content .bg-white,
    .blog-content .dark\\:bg-slate-800,
    .blog-content .bg-white.dark\\:bg-slate-800 {
        word-wrap: break-word !important;
        overflow-wrap: break-word !important;
        word-break: break-word !important;
        max-width: 100% !important;
        box-sizing: border-box !important;
    }
    
    .blog-content .bg-white p,
    .blog-content .dark\\:bg-slate-800 p,
    .blog-content .bg-white.dark\\:bg-slate-800 p {
        word-wrap: break-word !important;
        overflow-wrap: break-word !important;
        word-break: break-word !important;
        max-width: 100% !important;
        box-sizing: border-box !important;
    }
    
    /* Grid layout for feature cards */
    .blog-content .grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
        align-items: stretch;
    }
    
    .blog-content .grid > div {
        background-color: #1e293b;
        padding: 1rem;
        border-radius: 0.5rem;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        border: 1px solid #334155;
        display: flex;
        flex-direction: column;
    }
    
    .blog-content .grid > div h4 {
        font-weight: 600;
        color: #f8fafc;
        margin-bottom: 0.5rem;
        font-size: 1rem;
    }
    
    .blog-content .grid > div p {
        color: #cbd5e1;
        font-size: 0.875rem;
        margin-bottom: 0;
        line-height: 1.5;
    }
    .preview-content .feature-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
        align-items: stretch;
    }
    .preview-content .feature-card {
        background-color: #1e293b;
        padding: 1rem;
        border-radius: 0.5rem;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        border: 1px solid #334155;
        display: flex;
        flex-direction: column;
    }
    .preview-content .feature-card h4 {
        font-weight: 600;
        color: #f8fafc;
        margin-bottom: 0.5rem;
        font-size: 1rem;
    }
    .preview-content .feature-card p {
        color: #cbd5e1;
        font-size: 0.875rem;
        margin-bottom: 0;
        line-height: 1.5;
        word-wrap: break-word;
        overflow-wrap: break-word;
        word-break: break-word;
    }
    .preview-content .code-block {
        @apply bg-slate-900 dark:bg-slate-800 rounded-lg p-6 overflow-x-auto;
    }
    .preview-content .code-block pre {
        @apply text-green-400 text-sm;
    }
    .preview-content hr {
        @apply my-8 border-slate-200 dark:border-slate-700;
    }
    .preview-content .section {
        @apply mb-8;
    }
    .preview-content .subsection {
        @apply space-y-8;
    }
    
    /* Fix text wrapping for all preview content */
    .preview-content * {
        word-wrap: break-word;
        overflow-wrap: break-word;
        word-break: break-word;
        max-width: 100%;
        box-sizing: border-box;
    }
    
    /* Force text wrapping for specific elements in preview */
    .preview-content .bg-white,
    .preview-content .dark\\:bg-slate-800,
    .preview-content .bg-white.dark\\:bg-slate-800 {
        word-wrap: break-word !important;
        overflow-wrap: break-word !important;
        word-break: break-word !important;
        max-width: 100% !important;
        box-sizing: border-box !important;
    }
    
    .preview-content .bg-white p,
    .preview-content .dark\\:bg-slate-800 p,
    .preview-content .bg-white.dark\\:bg-slate-800 p {
        word-wrap: break-word !important;
        overflow-wrap: break-word !important;
        word-break: break-word !important;
        max-width: 100% !important;
        box-sizing: border-box !important;
    }
</style>
@endpush

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-[#1b1b18] dark:text-[#EDEDEC]">Create Blog Post</h1>
        <a href="{{ route('admin.blogs.index') }}" 
            class="text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">
            ← Back to Blog Management
        </a>
    </div>

    <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="xl:col-span-2 space-y-6">
                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2">
                        Title *
                    </label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" required
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
                        placeholder="Brief description of the blog post">{{ old('excerpt') }}</textarea>
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
                        {!! old('content') !!}
                    </div>
                    <input type="hidden" name="content" id="content-input" value="{{ old('content') }}">
                    @error('content')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Featured Image -->
                <div>
                    <label for="featured_image" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2">
                        Featured Image
                    </label>
                    <input type="file" name="featured_image" id="featured_image" accept="image/*"
                        class="w-full px-4 py-2 border border-[#3E3E3A] dark:border-[#3E3E3A] rounded-lg bg-white dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] focus:ring-2 focus:ring-[#706f6c] dark:focus:ring-[#A1A09A] focus:border-transparent">
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
                                <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Published</option>
                            </select>
                        </div>

                        <div>
                            <label for="published_at" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2">
                                Publish Date
                            </label>
                            <input type="datetime-local" name="published_at" id="published_at" value="{{ old('published_at') }}"
                                class="w-full px-4 py-2 border border-[#3E3E3A] dark:border-[#3E3E3A] rounded-lg bg-white dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] focus:ring-2 focus:ring-[#706f6c] dark:focus:ring-[#A1A09A] focus:border-transparent">
                        </div>

                        <div>
                            <label for="minutes_read" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2">
                                Reading Time (minutes)
                            </label>
                            <input type="number" name="minutes_read" id="minutes_read" value="{{ old('minutes_read', 1) }}" min="1" max="60" required
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
                                placeholder="Brief description for search engines">{{ old('meta_description') }}</textarea>
                        </div>

                        <div>
                            <label for="meta_tags" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2">
                                Tags
                            </label>
                            <input type="text" name="meta_tags" id="meta_tags" value="{{ old('meta_tags') }}"
                                class="w-full px-4 py-2 border border-[#3E3E3A] dark:border-[#3E3E3A] rounded-lg bg-white dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] focus:ring-2 focus:ring-[#706f6c] dark:focus:ring-[#A1A09A] focus:border-transparent"
                                placeholder="tag1, tag2, tag3">
                            <p class="text-xs text-[#706f6c] dark:text-[#A1A09A] mt-1">Separate tags with commas</p>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="bg-white dark:bg-[#1a1a1a] rounded-lg shadow-sm border border-[#3E3E3A] dark:border-[#3E3E3A] p-6">
                    <h3 class="text-lg font-semibold text-[#1b1b18] dark:text-[#EDEDEC] mb-4">Actions</h3>
                    
                    <div class="space-y-3">
                        <button type="submit" 
                            class="w-full px-4 py-2 bg-[#1b1b18] dark:bg-[#EDEDEC] text-[#FDFDFC] dark:text-[#0a0a0a] rounded-lg hover:bg-[#706f6c] dark:hover:bg-[#A1A09A] transition-colors font-medium">
                            Create Post
                        </button>
                        
                        <button type="button" id="preview-button"
                            class="w-full px-4 py-2 border border-[#3E3E3A] dark:border-[#3E3E3A] text-[#706f6c] dark:text-[#A1A09A] rounded-lg hover:bg-[#1a1a1a] dark:hover:bg-[#0a0a0a] transition-colors">
                            Preview
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Live Preview Panel -->
    <div class="mt-12">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-[#1b1b18] dark:text-[#EDEDEC]">Live Preview</h2>
            <div class="flex space-x-2">
                <button id="toggle-preview" class="px-4 py-2 bg-[#1b1b18] dark:bg-[#EDEDEC] text-[#FDFDFC] dark:text-[#0a0a0a] rounded-lg hover:bg-[#706f6c] dark:hover:bg-[#A1A09A] transition-colors">
                    Show Preview
                </button>
                <button id="fullscreen-preview" class="px-4 py-2 border border-[#3E3E3A] dark:border-[#3E3E3A] text-[#706f6c] dark:text-[#A1A09A] rounded-lg hover:bg-[#1a1a1a] dark:hover:bg-[#0a0a0a] transition-colors">
                    Fullscreen
                </button>
            </div>
        </div>

        <!-- Formatting Guide -->
        <div class="mb-6 bg-white dark:bg-[#1a1a1a] rounded-lg shadow-sm border border-[#3E3E3A] dark:border-[#3E3E3A] p-6">
            <h3 class="text-lg font-semibold text-[#1b1b18] dark:text-[#EDEDEC] mb-4">Formatting Guide</h3>
            <div class="grid md:grid-cols-2 gap-6 text-sm">
                <div>
                    <h4 class="font-semibold text-[#1b1b18] dark:text-[#EDEDEC] mb-2">Content Structure</h4>
                    <ul class="space-y-1 text-[#706f6c] dark:text-[#A1A09A]">
                        <li>• Use H1 for main title (already set)</li>
                        <li>• Use H2 for major sections</li>
                        <li>• Use H3 for subsections</li>
                        <li>• Use H4 for feature cards</li>
                        <li>• Use lists for step-by-step guides</li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold text-[#1b1b18] dark:text-[#EDEDEC] mb-2">Styling Tips</h4>
                    <ul class="space-y-1 text-[#706f6c] dark:text-[#A1A09A]">
                        <li>• Use <code class="bg-slate-200 dark:bg-slate-700 px-1 rounded">code-block</code> for code examples</li>
                        <li>• Use <code class="bg-slate-200 dark:bg-slate-700 px-1 rounded">blockquote</code> for highlights</li>
                        <li>• Use <strong>bold</strong> for emphasis</li>
                        <li>• Use <em>italic</em> for technical terms</li>
                    </ul>
                </div>
            </div>
            
            <div class="mt-4 p-4 bg-slate-50 dark:bg-slate-800 rounded-lg">
                <h4 class="font-semibold text-[#1b1b18] dark:text-[#EDEDEC] mb-2">Example: Highlight Box (like in seeder)</h4>
                <p class="text-xs text-[#706f6c] dark:text-[#A1A09A] mb-2">In the editor, create a div with class "highlight-box" and style it:</p>
                <div class="border-l-4 border-l-emerald-500 bg-emerald-50/50 dark:bg-emerald-900/10 rounded-r-lg p-4">
                    <h2 class="text-2xl font-bold mb-2 text-emerald-800 dark:text-emerald-200">Your Section Title</h2>
                    <p class="text-slate-700 dark:text-slate-300">Your content here...</p>
                </div>
            </div>
        </div>
        
        <div id="live-preview" class="hidden bg-white dark:bg-[#1a1a1a] rounded-lg shadow-sm border border-[#3E3E3A] dark:border-[#3E3E3A] p-8">
            <div id="preview-content" class="preview-content">
                <!-- Live preview content will be updated here -->
            </div>
        </div>
    </div>
</div>

<!-- Fullscreen Preview Modal -->
<div id="fullscreen-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white dark:bg-[#1a1a1a] rounded-lg shadow-xl max-w-6xl w-full max-h-[95vh] overflow-y-auto">
            <div class="flex justify-between items-center p-6 border-b border-[#3E3E3A] dark:border-[#3E3E3A]">
                <h3 class="text-lg font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">Fullscreen Preview</h3>
                <button id="close-fullscreen" class="text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC]">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div id="fullscreen-content" class="p-6 preview-content">
                <!-- Fullscreen preview content will be loaded here -->
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
<script>
    // Wait for DOM to be ready
    document.addEventListener('DOMContentLoaded', function() {
        console.log('DOM loaded, initializing Quill editor...');
        
        // Check if Quill is available
        if (typeof Quill === 'undefined') {
            console.error('Quill.js not loaded!');
            // Fallback to regular textarea
            const editorDiv = document.getElementById('editor');
            const contentInput = document.getElementById('content-input');
            if (editorDiv && contentInput) {
                editorDiv.innerHTML = '<textarea name="content" class="w-full px-4 py-2 border border-[#3E3E3A] dark:border-[#3E3E3A] rounded-lg bg-white dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] focus:ring-2 focus:ring-[#706f6c] dark:focus:ring-[#A1A09A] focus:border-transparent" rows="10" placeholder="Write your blog post content here...">' + contentInput.value + '</textarea>';
            }
            return;
        }

        // Initialize Quill editor
        try {
            var quill = new Quill('#editor', {
                theme: 'snow',
                placeholder: 'Write your blog post content here...',
                modules: {
                    toolbar: [
                        [{ 'header': [1, 2, 3, 4, false] }],
                        ['bold', 'italic', 'underline', 'strike'],
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                        [{ 'color': [] }, { 'background': [] }],
                        [{ 'align': [] }],
                        ['link', 'image', 'video', 'code-block', 'blockquote'],
                        ['clean']
                    ]
                }
            });
            
            // Add custom buttons after Quill is initialized
            setTimeout(() => {
                const toolbarContainer = document.querySelector('.ql-toolbar');
                
                // Add custom highlight box button
                const highlightBoxButton = document.createElement('button');
                highlightBoxButton.innerHTML = '📦';
                highlightBoxButton.title = 'Add Highlight Box';
                highlightBoxButton.style.cssText = 'margin-left: 10px; padding: 5px 10px; border: 1px solid #ccc; border-radius: 3px; background: white; cursor: pointer; font-size: 16px;';
                highlightBoxButton.onclick = function() {
                    const range = quill.getSelection();
                    if (range) {
                        const highlightBoxHTML = `
                            <div class="highlight-box">
                                <h2>Your Section Title</h2>
                                <p>Your content here...</p>
                            </div>
                        `;
                        quill.clipboard.dangerouslyPasteHTML(range.index, highlightBoxHTML);
                    }
                };
                
                // Add custom feature grid button
                const featureGridButton = document.createElement('button');
                featureGridButton.innerHTML = '🔲';
                featureGridButton.title = 'Add Feature Grid';
                featureGridButton.style.cssText = 'margin-left: 10px; padding: 5px 10px; border: 1px solid #ccc; border-radius: 3px; background: white; cursor: pointer; font-size: 16px;';
                featureGridButton.onclick = function() {
                    const range = quill.getSelection();
                    if (range) {
                        const featureGridHTML = `
                            <div class="mb-6">
                                <h3>Why Choose This?</h3>
                                <div class="grid md:grid-cols-2 gap-3">
                                    <div class="feature-card">
                                        <h4>Feature 1</h4>
                                        <p>Description of feature 1</p>
                                    </div>
                                    <div class="feature-card">
                                        <h4>Feature 2</h4>
                                        <p>Description of feature 2</p>
                                    </div>
                                </div>
                            </div>
                        `;
                        quill.clipboard.dangerouslyPasteHTML(range.index, featureGridHTML);
                    }
                };
                
                // Add custom code block button
                const codeBlockButton = document.createElement('button');
                codeBlockButton.innerHTML = '💻';
                codeBlockButton.title = 'Add Code Block';
                codeBlockButton.style.cssText = 'margin-left: 10px; padding: 5px 10px; border: 1px solid #ccc; border-radius: 3px; background: white; cursor: pointer; font-size: 16px;';
                codeBlockButton.onclick = function() {
                    const range = quill.getSelection();
                    if (range) {
                        const codeBlockHTML = `
                            <div class="bg-slate-900 dark:bg-slate-800 rounded-lg p-6 overflow-x-auto">
                                <pre class="text-green-400 text-sm"><code>Your code here...</code></pre>
                            </div>
                        `;
                        quill.clipboard.dangerouslyPasteHTML(range.index, codeBlockHTML);
                    }
                };
                
                toolbarContainer.appendChild(highlightBoxButton);
                toolbarContainer.appendChild(featureGridButton);
                toolbarContainer.appendChild(codeBlockButton);
            }, 100);

            console.log('Quill editor initialized successfully');

            // Update hidden input when content changes
            quill.on('text-change', function() {
                document.getElementById('content-input').value = quill.root.innerHTML;
                updateLivePreview();
            });

            // Live preview functionality
            function updateLivePreview() {
                const title = document.getElementById('title').value || 'Your Blog Post Title';
                const excerpt = document.getElementById('excerpt').value || 'Brief description of the blog post';
                const content = quill.root.innerHTML || '<p>Start writing your blog post content...</p>';
                const minutesRead = document.getElementById('minutes_read').value || 1;
                const tags = document.getElementById('meta_tags').value || 'tag1, tag2, tag3';

                // Process content to add styling classes for better formatting
                let processedContent = content;
                
                // Convert Quill's HTML to properly styled content
                // Handle highlight boxes (div with highlight-box class)
                console.log('Original content:', content);
                processedContent = processedContent.replace(
                    /<div[^>]*class="highlight-box"[^>]*>([\s\S]*?)<\/div>/g,
                    function(match, content) {
                        console.log('Found highlight-box match:', match);
                        // Extract h2 and p tags from the highlight box
                        const h2Match = content.match(/<h2[^>]*>([^<]+)<\/h2>/);
                        const pMatch = content.match(/<p[^>]*>([^<]+)<\/p>/);
                        
                        console.log('H2 match:', h2Match);
                        console.log('P match:', pMatch);
                        
                        if (h2Match && pMatch) {
                            const result = `<div class="highlight-box"><h2>${h2Match[1]}</h2><p>${pMatch[1]}</p></div>`;
                            console.log('Processed result:', result);
                            return result;
                        }
                        return match;
                    }
                );
                console.log('Processed content:', processedContent);
                
                // Decode HTML entities first
                processedContent = processedContent
                    .replace(/&lt;/g, '<')
                    .replace(/&gt;/g, '>')
                    .replace(/&nbsp;/g, ' ');
                
                // Alternative approach: Look for the specific content structure
                if (processedContent.includes('Django Custom Permissions') && processedContent.includes('Learn how to create user groups')) {
                    console.log('Found Django content, applying highlight box styling');
                    
                    // Remove the wrapping <p> tags and create proper highlight box
                    processedContent = processedContent.replace(
                        /<p>&lt;div class="highlight-box"&gt;<\/p><p>&nbsp;&nbsp;&lt;h2&gt;Django Custom Permissions&lt;\/h2&gt;<\/p><p>&nbsp;&nbsp;&lt;p&gt;Learn how to create user groups, attach users to specific groups and create your own application specific permissions other than django's default permissions.&lt;\/p&gt;<\/p><p>&nbsp;&nbsp;&lt;\/div&gt;<\/p>/g,
                        '<div class="highlight-box"><h2>Django Custom Permissions</h2><p>Learn how to create user groups, attach users to specific groups and create your own application specific permissions other than django\'s default permissions.</p></div>'
                    );
                    
                    console.log('After highlight box replacement:', processedContent);
                }
                
                // Handle regular headings and paragraphs with proper sizing
                processedContent = processedContent.replace(
                    /<h1[^>]*>([^<]+)<\/h1>/g,
                    '<h1 class="text-4xl font-bold mb-6 text-slate-900 dark:text-white">$1</h1>'
                );
                processedContent = processedContent.replace(
                    /<h2[^>]*>([^<]+)<\/h2>/g,
                    '<h2 class="text-3xl font-bold mb-6 text-slate-900 dark:text-white">$1</h2>'
                );
                processedContent = processedContent.replace(
                    /<h3[^>]*>([^<]+)<\/h3>/g,
                    '<h3 class="text-2xl font-bold mb-4 text-slate-900 dark:text-white">$1</h3>'
                );
                processedContent = processedContent.replace(
                    /<h4[^>]*>([^<]+)<\/h4>/g,
                    '<h4 class="text-xl font-semibold mb-3 text-slate-900 dark:text-white">$1</h4>'
                );
                
                // Handle code blocks
                processedContent = processedContent.replace(
                    /<pre[^>]*><code[^>]*>([\s\S]*?)<\/code><\/pre>/g,
                    '<div class="code-block"><pre><code>$1</code></pre></div>'
                );
                
                // Force grid layout for any div with grid class
                processedContent = processedContent.replace(
                    /<div[^>]*class="[^"]*grid[^"]*"[^>]*>/g,
                    '<div class="grid" style="display: grid !important; grid-template-columns: repeat(2, 1fr) !important; gap: 1rem !important; align-items: stretch !important;">'
                );
                
                // Force text wrapping for all divs with background classes
                processedContent = processedContent.replace(
                    /<div[^>]*class="[^"]*bg-white[^"]*"[^>]*>/g,
                    '<div class="feature-card" style="word-wrap: break-word !important; overflow-wrap: break-word !important; word-break: break-word !important; max-width: 100% !important; box-sizing: border-box !important;">'
                );
                
                // Force text wrapping for dark background divs
                processedContent = processedContent.replace(
                    /<div[^>]*class="[^"]*dark:bg-slate-800[^"]*"[^>]*>/g,
                    '<div class="feature-card" style="word-wrap: break-word !important; overflow-wrap: break-word !important; word-break: break-word !important; max-width: 100% !important; box-sizing: border-box !important;">'
                );
                
                // Process p tags only once, avoiding duplicates and empty tags
                processedContent = processedContent.replace(
                    /<p[^>]*>([^<]*?)<\/p>/g,
                    function(match, content) {
                        // Skip empty p tags completely
                        if (!content.trim()) {
                            return '';
                        }
                        // Only process p tags that contain actual text content, not HTML
                        if (!content.includes('<') && !content.includes('&lt;')) {
                            return `<p class="text-slate-700 dark:text-slate-300 leading-relaxed mb-4">${content.trim()}</p>`;
                        }
                        return match;
                    }
                );
                
                // Additional cleanup: Remove any remaining empty p tags
                processedContent = processedContent.replace(/<p[^>]*>\s*<\/p>/g, '');
                
                // Remove any p tags that only contain whitespace or HTML entities
                processedContent = processedContent.replace(/<p[^>]*>[\s&nbsp;]*<\/p>/g, '');
                
                // Final cleanup: Remove any completely empty p tags that might have been created
                processedContent = processedContent.replace(/<p[^>]*>\s*<\/p>/g, '');
                
                console.log('Content after cleanup:', processedContent);
                
                console.log('Final processed content:', processedContent);

                const previewHTML = `
                    <div class="mb-8">
                        <h1 class="text-4xl font-bold mb-4 text-slate-900 dark:text-white">${title}</h1>
                        <p class="text-lg text-slate-600 dark:text-slate-400 mb-4">${excerpt}</p>
                        <div class="flex items-center space-x-4 text-sm text-slate-500 dark:text-slate-400">
                            <span>${minutesRead} min read</span>
                            <span>•</span>
                            <span>Tags: ${tags}</span>
                        </div>
                    </div>
                    <hr class="my-8 border-slate-200 dark:border-slate-700">
                    <div class="blog-content">
                        ${processedContent}
                    </div>
                `;

                document.getElementById('preview-content').innerHTML = previewHTML;
                document.getElementById('fullscreen-content').innerHTML = previewHTML;
            }

            // Toggle preview panel
            document.getElementById('toggle-preview').addEventListener('click', function() {
                const preview = document.getElementById('live-preview');
                const button = this;
                
                if (preview.classList.contains('hidden')) {
                    preview.classList.remove('hidden');
                    button.textContent = 'Hide Preview';
                    updateLivePreview();
                } else {
                    preview.classList.add('hidden');
                    button.textContent = 'Show Preview';
                }
            });

            // Fullscreen preview
            document.getElementById('fullscreen-preview').addEventListener('click', function() {
                updateLivePreview();
                document.getElementById('fullscreen-modal').classList.remove('hidden');
            });

            document.getElementById('close-fullscreen').addEventListener('click', function() {
                document.getElementById('fullscreen-modal').classList.add('hidden');
            });

            // Close fullscreen modal when clicking outside
            document.getElementById('fullscreen-modal').addEventListener('click', function(e) {
                if (e.target === this) {
                    this.classList.add('hidden');
                }
            });

            // Update preview when other fields change
            document.getElementById('title').addEventListener('input', updateLivePreview);
            document.getElementById('excerpt').addEventListener('input', updateLivePreview);
            document.getElementById('minutes_read').addEventListener('input', updateLivePreview);
            document.getElementById('meta_tags').addEventListener('input', updateLivePreview);

            // Initial preview update
            updateLivePreview();

        } catch (error) {
            console.error('Error initializing Quill editor:', error);
            // Fallback to regular textarea
            const editorDiv = document.getElementById('editor');
            const contentInput = document.getElementById('content-input');
            if (editorDiv && contentInput) {
                editorDiv.innerHTML = '<textarea name="content" class="w-full px-4 py-2 border border-[#3E3E3A] dark:border-[#3E3E3A] rounded-lg bg-white dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] focus:ring-2 focus:ring-[#706f6c] dark:focus:ring-[#A1A09A] focus:border-transparent" rows="10" placeholder="Write your blog post content here...">' + contentInput.value + '</textarea>';
            }
        }
    });
</script>
@endpush 