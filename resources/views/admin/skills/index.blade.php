@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-4xl font-bold text-[#1b1b18] dark:text-[#EDEDEC]">Skills</h1>
                <p class="mt-2 text-[#706f6c] dark:text-[#A1A09A]">Manage your skills and expertise</p>
            </div>
            <a href="{{ route('admin.skills.create') }}" 
                class="px-6 py-2.5 rounded-lg bg-[#1b1b18] dark:bg-[#EDEDEC] text-[#EDEDEC] dark:text-[#1b1b18] hover:opacity-90 transition-opacity">
                Add New Skill
            </a>
        </div>

        <!-- Skills List -->
        <div class="bg-[#1a1a1a] dark:bg-[#0a0a0a] rounded-xl shadow-sm border border-[#3E3E3A] dark:border-[#3E3E3A] overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-[#3E3E3A]">
                            <th class="px-6 py-4 text-left text-sm font-medium text-[#706f6c] dark:text-[#A1A09A]">Name</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-[#706f6c] dark:text-[#A1A09A]">Category</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-[#706f6c] dark:text-[#A1A09A]">Proficiency</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-[#706f6c] dark:text-[#A1A09A]">Order</th>
                            <th class="px-6 py-4 text-right text-sm font-medium text-[#706f6c] dark:text-[#A1A09A]">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#3E3E3A]">
                        @foreach($skills as $skill)
                        <tr class="hover:bg-[#161615] dark:hover:bg-[#1a1a1a] transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    @if($skill->icon)
                                        <img src="{{ asset('storage/' . $skill->icon) }}" alt="{{ $skill->name }}" class="h-8 w-8 mr-3">
                                    @endif
                                    <div class="text-sm text-[#1b1b18] dark:text-[#EDEDEC]">
                                        {{ $skill->name }}
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                    {{ $skill->category }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="w-full bg-[#e3e3e0] dark:bg-[#3E3E3A] rounded-full h-2">
                                    <div class="bg-[#1b1b18] dark:bg-[#EDEDEC] h-2 rounded-full" style="width: {{ $skill->proficiency }}%"></div>
                                </div>
                                <span class="text-xs text-[#706f6c] dark:text-[#A1A09A] mt-1">{{ $skill->proficiency }}%</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-[#706f6c] dark:text-[#A1A09A]">
                                {{ $skill->order }}
                            </td>
                            <td class="px-6 py-4 text-right text-sm">
                                <div class="flex justify-end space-x-3">
                                    <a href="{{ route('admin.skills.edit', $skill) }}" 
                                        class="text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                            class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300 transition-colors"
                                            onclick="return confirm('Are you sure you want to delete this skill?')">
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
            {{ $skills->links() }}
        </div>
    </div>
</div>
@endsection 