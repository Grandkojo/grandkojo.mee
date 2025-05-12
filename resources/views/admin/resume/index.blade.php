@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-4xl font-bold text-[#1b1b18] dark:text-[#EDEDEC]">Resume Items</h1>
                <p class="mt-2 text-[#706f6c] dark:text-[#A1A09A]">Manage your resume items including experience, education, and certifications.</p>
            </div>
            <a href="{{ route('admin.resume.create') }}" 
                class="px-6 py-2.5 rounded-lg bg-[#1b1b18] dark:bg-[#EDEDEC] text-[#EDEDEC] dark:text-[#1b1b18] hover:opacity-90 transition-opacity">
                Add New Item
            </a>
        </div>

        <!-- Resume Items List -->
        <div class="bg-[#1a1a1a] dark:bg-[#0a0a0a] rounded-xl shadow-sm border border-[#3E3E3A] dark:border-[#3E3E3A] overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-[#3E3E3A]">
                            <th class="px-6 py-4 text-left text-sm font-medium text-[#706f6c] dark:text-[#A1A09A]">Type</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-[#706f6c] dark:text-[#A1A09A]">Title</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-[#706f6c] dark:text-[#A1A09A]">Organization</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-[#706f6c] dark:text-[#A1A09A]">Date Range</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-[#706f6c] dark:text-[#A1A09A]">Order</th>
                            <th class="px-6 py-4 text-right text-sm font-medium text-[#706f6c] dark:text-[#A1A09A]">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#3E3E3A]">
                        @foreach($resumeItems as $item)
                        <tr class="hover:bg-[#161615] dark:hover:bg-[#1a1a1a] transition-colors">
                            <td class="px-6 py-4 text-sm text-[#1b1b18] dark:text-[#EDEDEC]">
                                <span class="px-3 py-1 rounded-full text-xs font-medium
                                    @if($item->type === 'experience') bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200
                                    @elseif($item->type === 'education') bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200
                                    @else bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200
                                    @endif">
                                    {{ ucfirst($item->type) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-[#1b1b18] dark:text-[#EDEDEC]">{{ $item->title }}</td>
                            <td class="px-6 py-4 text-sm text-[#706f6c] dark:text-[#A1A09A]">{{ $item->organization }}</td>
                            <td class="px-6 py-4 text-sm text-[#706f6c] dark:text-[#A1A09A]">
                                {{ $item->start_date->format('M Y') }} - {{ $item->end_date ? $item->end_date->format('M Y') : 'Present' }}
                            </td>
                            <td class="px-6 py-4 text-sm text-[#706f6c] dark:text-[#A1A09A]">{{ $item->order }}</td>
                            <td class="px-6 py-4 text-right text-sm">
                                <div class="flex justify-end space-x-3">
                                    <a href="{{ route('admin.resume.edit', $item) }}" 
                                        class="text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.resume.destroy', $item) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                            class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300 transition-colors"
                                            onclick="return confirm('Are you sure you want to delete this item?')">
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
    </div>
</div>
@endsection 