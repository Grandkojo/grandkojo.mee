@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-4xl font-bold text-[#1b1b18] dark:text-[#EDEDEC]">Projects</h1>
                <p class="mt-2 text-[#706f6c] dark:text-[#A1A09A]">Manage your portfolio projects</p>
            </div>
            <a href="{{ route('admin.projects.create') }}" 
                class="px-6 py-2.5 rounded-lg bg-[#1b1b18] dark:bg-[#EDEDEC] text-[#EDEDEC] dark:text-[#1b1b18] hover:opacity-90 transition-opacity">
                Add New Project
            </a>
        </div>

        <!-- Projects List -->
        <div class="bg-[#1a1a1a] dark:bg-[#0a0a0a] rounded-xl shadow-sm border border-[#3E3E3A] dark:border-[#3E3E3A] overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-[#3E3E3A]">
                            <th class="px-6 py-4 text-left text-sm font-medium text-[#706f6c] dark:text-[#A1A09A]">Title</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-[#706f6c] dark:text-[#A1A09A]">Technologies</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-[#706f6c] dark:text-[#A1A09A]">Featured</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-[#706f6c] dark:text-[#A1A09A]">Order</th>
                            <th class="px-6 py-4 text-right text-sm font-medium text-[#706f6c] dark:text-[#A1A09A]">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#3E3E3A]">
                        @foreach($projects as $project)
                        <tr class="hover:bg-[#161615] dark:hover:bg-[#1a1a1a] transition-colors">
                            <td class="px-6 py-4">
                                <div class="text-sm text-[#1b1b18] dark:text-[#EDEDEC]">
                                    {{ $project->title }}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-wrap gap-2">
                                    @foreach($project->technologies as $tech)
                                    <span class="px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                        {{ $tech }}
                                    </span>
                                    @endforeach
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full text-xs font-medium {{ $project->is_featured ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-[#e3e3e0] text-[#706f6c] dark:bg-[#3E3E3A] dark:text-[#A1A09A]' }}">
                                    {{ $project->is_featured ? 'Yes' : 'No' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-[#706f6c] dark:text-[#A1A09A]">
                                {{ $project->order }}
                            </td>
                            <td class="px-6 py-4 text-right text-sm">
                                <div class="flex justify-end space-x-3">
                                    <a href="{{ route('admin.projects.edit', $project) }}" 
                                        class="text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                            class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300 transition-colors"
                                            onclick="return confirm('Are you sure you want to delete this project?')">
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
        </div>

        <div class="mt-6">
            {{ $projects->links() }}
        </div>
    </div>
</div>
@endsection 