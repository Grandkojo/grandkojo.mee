@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8">Admin Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Projects Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-semibold">Projects</h2>
                <a href="{{ route('admin.projects.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm">
                    Add New
                </a>
            </div>
            <p class="text-gray-600 dark:text-gray-400 mb-4">Manage your portfolio projects</p>
            <a href="{{ route('admin.projects.index') }}" class="text-blue-500 hover:text-blue-600">
                View all projects →
            </a>
        </div>

        <!-- Skills Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-semibold">Skills</h2>
                <a href="{{ route('admin.skills.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm">
                    Add New
                </a>
            </div>
            <p class="text-gray-600 dark:text-gray-400 mb-4">Manage your skills and expertise</p>
            <a href="{{ route('admin.skills.index') }}" class="text-blue-500 hover:text-blue-600">
                View all skills →
            </a>
        </div>

        <!-- Resume Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-semibold">Resume</h2>
                <a href="{{ route('admin.resume.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm">
                    Add New
                </a>
            </div>
            <p class="text-gray-600 dark:text-gray-400 mb-4">Manage your experience, education, and certifications</p>
            <a href="{{ route('admin.resume.index') }}" class="text-blue-500 hover:text-blue-600">
                View all resume items →
            </a>
        </div>
    </div>
</div>
@endsection 