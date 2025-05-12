@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-[#1b1b18] dark:text-[#EDEDEC]">{{ isset($skill) ? 'Edit Skill' : 'Add New Skill' }}</h1>
            <p class="mt-2 text-[#706f6c] dark:text-[#A1A09A]">Fill in the details below to {{ isset($skill) ? 'update' : 'add' }} a skill to your portfolio.</p>
        </div>

        <form action="{{ isset($skill) ? route('admin.skills.update', $skill) : route('admin.skills.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf
            @if(isset($skill))
                @method('PUT')
            @endif

            <div class="bg-[#1a1a1a] dark:bg-[#0a0a0a] rounded-xl shadow-sm border border-[#3E3E3A] dark:border-[#3E3E3A] p-6 space-y-6">
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-[#706f6c] dark:text-[#A1A09A] mb-2">Skill Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $skill->name ?? '') }}" required
                        class="w-full px-4 py-2.5 rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A] bg-white dark:bg-[#1a1a1a] text-[#1b1b18] dark:text-[#EDEDEC] focus:outline-none focus:ring-2 focus:ring-[#1b1b18] dark:focus:ring-[#EDEDEC] transition-colors"
                        placeholder="e.g., Laravel, React, Node.js">
                    @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category -->
                <div>
                    <label for="category" class="block text-sm font-medium text-[#706f6c] dark:text-[#A1A09A] mb-2">Category</label>
                    <select name="category" id="category" required
                        class="w-full px-4 py-2.5 rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A] bg-white dark:bg-[#1a1a1a] text-[#1b1b18] dark:text-[#EDEDEC] focus:outline-none focus:ring-2 focus:ring-[#1b1b18] dark:focus:ring-[#EDEDEC] transition-colors">
                        <option value="">Select a category</option>
                        <option value="Frontend" {{ old('category', $skill->category ?? '') == 'Frontend' ? 'selected' : '' }}>Frontend</option>
                        <option value="Backend" {{ old('category', $skill->category ?? '') == 'Backend' ? 'selected' : '' }}>Backend</option>
                        <option value="Database" {{ old('category', $skill->category ?? '') == 'Database' ? 'selected' : '' }}>Database</option>
                        <option value="DevOps" {{ old('category', $skill->category ?? '') == 'DevOps' ? 'selected' : '' }}>DevOps</option>
                        <option value="Tools" {{ old('category', $skill->category ?? '') == 'Tools' ? 'selected' : '' }}>Tools</option>
                    </select>
                    @error('category')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Proficiency -->
                <div>
                    <label for="proficiency" class="block text-sm font-medium text-[#706f6c] dark:text-[#A1A09A] mb-2">Proficiency Level</label>
                    <div class="space-y-2">
                        <input type="range" name="proficiency" id="proficiency" min="0" max="100" step="5" value="{{ old('proficiency', $skill->proficiency ?? 50) }}" required
                            class="w-full h-2 bg-[#e3e3e0] dark:bg-[#3E3E3A] rounded-lg appearance-none cursor-pointer"
                            oninput="this.nextElementSibling.value = this.value">
                        <div class="flex justify-between items-center">
                            <output class="text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC]">{{ old('proficiency', $skill->proficiency ?? 50) }}%</output>
                            <div class="text-xs text-[#706f6c] dark:text-[#A1A09A]">Drag to adjust</div>
                        </div>
                    </div>
                    @error('proficiency')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Icon -->
                <div>
                    <label for="icon" class="block text-sm font-medium text-[#706f6c] dark:text-[#A1A09A] mb-2">Skill Icon</label>
                    @if(isset($skill) && $skill->icon)
                        <div class="mb-4 p-4 bg-[#FDFDFC] dark:bg-[#0a0a0a] rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A]">
                            <img src="{{ asset('storage/' . $skill->icon) }}" alt="{{ $skill->name }}" class="h-12 w-12 object-contain">
                        </div>
                    @endif
                    <div class="flex items-center justify-center w-full">
                        <label for="icon" class="flex flex-col items-center justify-center w-full h-32 border-2 border-[#e3e3e0] dark:border-[#3E3E3A] border-dashed rounded-lg cursor-pointer bg-[#FDFDFC] dark:bg-[#0a0a0a] hover:bg-[#f5f5f5] dark:hover:bg-[#161615] transition-colors">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-[#706f6c] dark:text-[#A1A09A]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-[#706f6c] dark:text-[#A1A09A]"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-[#706f6c] dark:text-[#A1A09A]">PNG, JPG or SVG (MAX. 2MB)</p>
                            </div>
                            <input id="icon" name="icon" type="file" class="hidden" accept="image/*">
                        </label>
                    </div>
                    @error('icon')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Order -->
                <div>
                    <label for="order" class="block text-sm font-medium text-[#706f6c] dark:text-[#A1A09A] mb-2">Display Order</label>
                    <div class="relative">
                        <input type="number" name="order" id="order" value="{{ old('order', $skill->order ?? 0) }}"
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
                <a href="{{ route('admin.skills.index') }}" 
                    class="px-6 py-2.5 rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A] text-[#706f6c] dark:text-[#A1A09A] hover:bg-[#f5f5f5] dark:hover:bg-[#161615] transition-colors">
                    Cancel
                </a>
                <button type="submit" 
                    class="px-6 py-2.5 rounded-lg bg-[#1b1b18] dark:bg-[#EDEDEC] text-[#EDEDEC] dark:text-[#1b1b18] hover:opacity-90 transition-opacity">
                    {{ isset($skill) ? 'Update Skill' : 'Create Skill' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection 