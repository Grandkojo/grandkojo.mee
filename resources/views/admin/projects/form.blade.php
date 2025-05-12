@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-[#1b1b18] dark:text-[#EDEDEC]">{{ isset($project) ? 'Edit Project' : 'Add New Project' }}</h1>
            <p class="mt-2 text-[#706f6c] dark:text-[#A1A09A]">Fill in the details below to {{ isset($project) ? 'update' : 'add' }} a project to your portfolio.</p>
        </div>

        <form action="{{ isset($project) ? route('admin.projects.update', $project) : route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf
            @if(isset($project))
                @method('PUT')
            @endif

            <div class="bg-[#1a1a1a] dark:bg-[#0a0a0a] rounded-xl shadow-sm border border-[#3E3E3A] dark:border-[#3E3E3A] p-6 space-y-6">
                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-[#706f6c] dark:text-[#A1A09A] mb-2">Project Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $project->title ?? '') }}" required
                        class="w-full px-4 py-2.5 rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A] bg-white dark:bg-[#1a1a1a] text-[#1b1b18] dark:text-[#EDEDEC] focus:outline-none focus:ring-2 focus:ring-[#1b1b18] dark:focus:ring-[#EDEDEC] transition-colors"
                        placeholder="Enter project title">
                    @error('title')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-[#706f6c] dark:text-[#A1A09A] mb-2">Description</label>
                    <textarea name="description" id="description" rows="4" required
                        class="w-full px-4 py-2.5 rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A] bg-white dark:bg-[#1a1a1a] text-[#1b1b18] dark:text-[#EDEDEC] focus:outline-none focus:ring-2 focus:ring-[#1b1b18] dark:focus:ring-[#EDEDEC] transition-colors"
                        placeholder="Describe your project...">{{ old('description', $project->description ?? '') }}</textarea>
                    @error('description')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Technologies -->
                <div>
                    <label for="technologies" class="block text-sm font-medium text-[#706f6c] dark:text-[#A1A09A] mb-2">Technologies Used</label>
                    <input type="text" name="technologies" id="technologies" value="{{ old('technologies', isset($project) ? implode(', ', $project->technologies) : '') }}" required
                        class="w-full px-4 py-2.5 rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A] bg-white dark:bg-[#1a1a1a] text-[#1b1b18] dark:text-[#EDEDEC] focus:outline-none focus:ring-2 focus:ring-[#1b1b18] dark:focus:ring-[#EDEDEC] transition-colors"
                        placeholder="e.g., Laravel, Vue.js, Tailwind CSS">
                    <p class="mt-2 text-xs text-[#706f6c] dark:text-[#A1A09A]">Separate technologies with commas</p>
                    @error('technologies')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- URLs -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="project_url" class="block text-sm font-medium text-[#706f6c] dark:text-[#A1A09A] mb-2">Project URL</label>
                        <div class="relative">
                            <input type="url" name="project_url" id="project_url" value="{{ old('project_url', $project->project_url ?? '') }}"
                                class="w-full pl-10 pr-4 py-2.5 rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A] bg-white dark:bg-[#1a1a1a] text-[#1b1b18] dark:text-[#EDEDEC] focus:outline-none focus:ring-2 focus:ring-[#1b1b18] dark:focus:ring-[#EDEDEC] transition-colors"
                                placeholder="https://example.com">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-[#706f6c] dark:text-[#A1A09A]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                </svg>
                            </div>
                        </div>
                        @error('project_url')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="github_url" class="block text-sm font-medium text-[#706f6c] dark:text-[#A1A09A] mb-2">GitHub URL</label>
                        <div class="relative">
                            <input type="url" name="github_url" id="github_url" value="{{ old('github_url', $project->github_url ?? '') }}"
                                class="w-full pl-10 pr-4 py-2.5 rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A] bg-white dark:bg-[#1a1a1a] text-[#1b1b18] dark:text-[#EDEDEC] focus:outline-none focus:ring-2 focus:ring-[#1b1b18] dark:focus:ring-[#EDEDEC] transition-colors"
                                placeholder="https://github.com/username/repo">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-[#706f6c] dark:text-[#A1A09A]" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        @error('github_url')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Featured Image -->
                <div>
                    <label for="featured_image" class="block text-sm font-medium text-[#706f6c] dark:text-[#A1A09A] mb-2">Featured Image</label>
                    @if(isset($project) && $project->featured_image)
                        <div class="mb-4 p-4 bg-[#FDFDFC] dark:bg-[#0a0a0a] rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A]">
                            <img src="{{ asset('storage/' . $project->featured_image) }}" alt="{{ $project->title }}" class="h-32 w-auto object-cover rounded-lg">
                        </div>
                    @endif
                    <div class="flex items-center justify-center w-full">
                        <label for="featured_image" class="flex flex-col items-center justify-center w-full h-48 border-2 border-[#e3e3e0] dark:border-[#3E3E3A] border-dashed rounded-lg cursor-pointer bg-[#FDFDFC] dark:bg-[#0a0a0a] hover:bg-[#f5f5f5] dark:hover:bg-[#161615] transition-colors">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-10 h-10 mb-4 text-[#706f6c] dark:text-[#A1A09A]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-[#706f6c] dark:text-[#A1A09A]"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-[#706f6c] dark:text-[#A1A09A]">PNG, JPG or WEBP (MAX. 2MB)</p>
                            </div>
                            <input id="featured_image" name="featured_image" type="file" class="hidden" accept="image/*">
                        </label>
                    </div>
                    @error('featured_image')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Order -->
                <div>
                    <label for="order" class="block text-sm font-medium text-[#706f6c] dark:text-[#A1A09A] mb-2">Display Order</label>
                    <div class="relative">
                        <input type="number" name="order" id="order" value="{{ old('order', $project->order ?? 0) }}"
                            class="w-full px-4 py-2.5 rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A] bg-white dark:bg-[#1a1a1a] text-[#1b1b18] dark:text-[#EDEDEC] focus:outline-none focus:ring-2 focus:ring-[#1b1b18] dark:focus:ring-[#EDEDEC] transition-colors"
                            placeholder="Enter display order">
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <span class="text-[#706f6c] dark:text-[#A1A09A] text-sm">#</span>
                        </div>
                    </div>
                    <p class="mt-2 text-xs text-[#706f6c] dark:text-[#A1A09A]">Lower numbers will appear first in the list</p>
                    @error('order')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.projects.index') }}" 
                    class="px-6 py-2.5 rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A] text-[#706f6c] dark:text-[#A1A09A] hover:bg-[#f5f5f5] dark:hover:bg-[#161615] transition-colors">
                    Cancel
                </a>
                <button type="submit" 
                    class="px-6 py-2.5 rounded-lg bg-[#1b1b18] dark:bg-[#EDEDEC] text-[#EDEDEC] dark:text-[#1b1b18] hover:opacity-90 transition-opacity">
                    {{ isset($project) ? 'Update Project' : 'Create Project' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection 