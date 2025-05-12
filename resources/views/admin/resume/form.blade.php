@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-[#1b1b18] dark:text-[#EDEDEC]">{{ isset($resumeItem) ? 'Edit Resume Item' : 'Add New Resume Item' }}</h1>
            <p class="mt-2 text-[#706f6c] dark:text-[#A1A09A]">Fill in the details below to {{ isset($resumeItem) ? 'update' : 'add' }} a resume item.</p>
        </div>

        <form action="{{ isset($resumeItem) ? route('admin.resume.update', $resumeItem) : route('admin.resume.store') }}" method="POST" class="space-y-8">
            @csrf
            @if(isset($resumeItem))
                @method('PUT')
            @endif

            <div class="bg-[#1a1a1a] dark:bg-[#0a0a0a] rounded-xl shadow-sm border border-[#3E3E3A] dark:border-[#3E3E3A] p-6 space-y-6">
                <!-- Type -->
                <div>
                    <label for="type" class="block text-sm font-medium text-[#706f6c] dark:text-[#A1A09A] mb-2">Type</label>
                    <select name="type" id="type" required
                        class="w-full px-4 py-2.5 rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A] bg-white dark:bg-[#1a1a1a] text-[#1b1b18] dark:text-[#EDEDEC] focus:outline-none focus:ring-2 focus:ring-[#1b1b18] dark:focus:ring-[#EDEDEC] transition-colors">
                        <option value="experience" {{ (old('type', $resumeItem->type ?? '') === 'experience') ? 'selected' : '' }}>Experience</option>
                        <option value="education" {{ (old('type', $resumeItem->type ?? '') === 'education') ? 'selected' : '' }}>Education</option>
                        <option value="certification" {{ (old('type', $resumeItem->type ?? '') === 'certification') ? 'selected' : '' }}>Certification</option>
                    </select>
                    @error('type')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-[#706f6c] dark:text-[#A1A09A] mb-2">Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $resumeItem->title ?? '') }}" required
                        class="w-full px-4 py-2.5 rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A] bg-white dark:bg-[#1a1a1a] text-[#1b1b18] dark:text-[#EDEDEC] focus:outline-none focus:ring-2 focus:ring-[#1b1b18] dark:focus:ring-[#EDEDEC] transition-colors"
                        placeholder="Enter title">
                    @error('title')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Organization -->
                <div>
                    <label for="organization" class="block text-sm font-medium text-[#706f6c] dark:text-[#A1A09A] mb-2">Organization</label>
                    <input type="text" name="organization" id="organization" value="{{ old('organization', $resumeItem->organization ?? '') }}" required
                        class="w-full px-4 py-2.5 rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A] bg-white dark:bg-[#1a1a1a] text-[#1b1b18] dark:text-[#EDEDEC] focus:outline-none focus:ring-2 focus:ring-[#1b1b18] dark:focus:ring-[#EDEDEC] transition-colors"
                        placeholder="Enter organization name">
                    @error('organization')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Location -->
                <div>
                    <label for="location" class="block text-sm font-medium text-[#706f6c] dark:text-[#A1A09A] mb-2">Location</label>
                    <input type="text" name="location" id="location" value="{{ old('location', $resumeItem->location ?? '') }}"
                        class="w-full px-4 py-2.5 rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A] bg-white dark:bg-[#1a1a1a] text-[#1b1b18] dark:text-[#EDEDEC] focus:outline-none focus:ring-2 focus:ring-[#1b1b18] dark:focus:ring-[#EDEDEC] transition-colors"
                        placeholder="Enter location (optional)">
                    @error('location')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Date Range -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="start_date" class="block text-sm font-medium text-[#706f6c] dark:text-[#A1A09A] mb-2">Start Date</label>
                        <input type="date" name="start_date" id="start_date" value="{{ old('start_date', isset($resumeItem) ? $resumeItem->start_date->format('Y-m-d') : '') }}" required
                            class="w-full px-4 py-2.5 rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A] bg-white dark:bg-[#1a1a1a] text-[#1b1b18] dark:text-[#EDEDEC] focus:outline-none focus:ring-2 focus:ring-[#1b1b18] dark:focus:ring-[#EDEDEC] transition-colors">
                        @error('start_date')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="end_date" class="block text-sm font-medium text-[#706f6c] dark:text-[#A1A09A] mb-2">End Date</label>
                        <input type="date" name="end_date" id="end_date" value="{{ old('end_date', isset($resumeItem) && $resumeItem->end_date ? $resumeItem->end_date->format('Y-m-d') : '') }}"
                            class="w-full px-4 py-2.5 rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A] bg-white dark:bg-[#1a1a1a] text-[#1b1b18] dark:text-[#EDEDEC] focus:outline-none focus:ring-2 focus:ring-[#1b1b18] dark:focus:ring-[#EDEDEC] transition-colors"
                            placeholder="Leave empty for present">
                        @error('end_date')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-[#706f6c] dark:text-[#A1A09A] mb-2">Description</label>
                    <textarea name="description" id="description" rows="4"
                        class="w-full px-4 py-2.5 rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A] bg-white dark:bg-[#1a1a1a] text-[#1b1b18] dark:text-[#EDEDEC] focus:outline-none focus:ring-2 focus:ring-[#1b1b18] dark:focus:ring-[#EDEDEC] transition-colors"
                        placeholder="Enter description (optional)">{{ old('description', $resumeItem->description ?? '') }}</textarea>
                    @error('description')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Order -->
                <div>
                    <label for="order" class="block text-sm font-medium text-[#706f6c] dark:text-[#A1A09A] mb-2">Display Order</label>
                    <input type="number" name="order" id="order" value="{{ old('order', $resumeItem->order ?? 0) }}"
                        class="w-full px-4 py-2.5 rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A] bg-white dark:bg-[#1a1a1a] text-[#1b1b18] dark:text-[#EDEDEC] focus:outline-none focus:ring-2 focus:ring-[#1b1b18] dark:focus:ring-[#EDEDEC] transition-colors"
                        placeholder="Enter display order">
                    <p class="mt-2 text-xs text-[#706f6c] dark:text-[#A1A09A]">Lower numbers will appear first in the list</p>
                    @error('order')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.resume.index') }}" 
                    class="px-6 py-2.5 rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A] text-[#706f6c] dark:text-[#A1A09A] hover:bg-[#f5f5f5] dark:hover:bg-[#161615] transition-colors">
                    Cancel
                </a>
                <button type="submit" 
                    class="px-6 py-2.5 rounded-lg bg-[#1b1b18] dark:bg-[#EDEDEC] text-[#EDEDEC] dark:text-[#1b1b18] hover:opacity-90 transition-opacity">
                    {{ isset($resumeItem) ? 'Update Item' : 'Create Item' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection 