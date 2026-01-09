@extends('layouts.app')

@section('title', $project->title . ' | Grandkojo')
@section('meta_description', $project->title . ' - Project by Ernest Kojo Owusu Essien')

@section('content')
    <!-- Project Details Section -->
    <section class="pt-32 pb-16 px-4 sm:px-6 lg:px-8 min-h-screen">
        <div class="max-w-6xl mx-auto">
            <!-- Back Button -->
            <a href="{{ route('portfolio') }}#projects" class="inline-flex items-center text-sm text-[#706f6c] dark:text-[#A1A09A] hover:text-cyan-400 dark:hover:text-cyan-400 transition-colors mb-8 group">
                <svg class="w-5 h-5 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Back to Projects
            </a>

            <!-- Project Hero -->
            <div class="mb-12 fade-in">
                <h1 class="text-4xl md:text-5xl font-bold mb-4 bg-gradient-to-r from-cyan-400 to-purple-400 bg-clip-text text-transparent">{{ $project->title }}</h1>
                @if($project->featured_image)
                    <div class="rounded-2xl overflow-hidden backdrop-blur-sm bg-white/5 dark:bg-white/5 border border-white/10 dark:border-white/10 shadow-2xl mb-8">
                        <img 
                            src="{{ asset('images/project-imgs/' . $project->featured_image) }}" 
                            alt="{{ $project->title }}"
                            class="w-full h-auto object-cover"
                        >
                    </div>
                @endif
            </div>

            <!-- Project Content -->
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="md:col-span-2 space-y-8">
                    <!-- Description -->
                    <div class="backdrop-blur-md bg-white/5 dark:bg-white/5 rounded-2xl p-8 border border-white/10 dark:border-white/10 shadow-xl fade-in-up">
                        <h2 class="text-2xl font-semibold mb-4 text-[#1b1b18] dark:text-[#EDEDEC]">About This Project</h2>
                        <p class="text-lg text-[#706f6c] dark:text-[#A1A09A] leading-relaxed">{{ $project->description }}</p>
                    </div>

                    <!-- Demo Video -->
                    @if($project->demo_url)
                    <div class="backdrop-blur-md bg-white/5 dark:bg-white/5 rounded-2xl p-8 border border-white/10 dark:border-white/10 shadow-xl fade-in-up">
                        <h2 class="text-2xl font-semibold mb-6 text-[#1b1b18] dark:text-[#EDEDEC]">Demo Video</h2>
                        <div class="aspect-video rounded-lg overflow-hidden">
                            @php
                                // Extract YouTube video ID from URL
                                $videoId = null;
                                if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $project->demo_url, $matches)) {
                                    $videoId = $matches[1];
                                }
                            @endphp
                            @if($videoId)
                                <iframe 
                                    class="w-full h-full" 
                                    src="https://www.youtube.com/embed/{{ $videoId }}" 
                                    title="YouTube video player" 
                                    frameborder="0" 
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                    allowfullscreen>
                                </iframe>
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-[#1a1a1a] dark:bg-[#161615]">
                                    <a href="{{ $project->demo_url }}" target="_blank" class="text-cyan-400 hover:text-cyan-300 transition-colors">
                                        Watch Demo on YouTube →
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <!-- Technologies -->
                    <div class="backdrop-blur-md bg-white/5 dark:bg-white/5 rounded-2xl p-6 border border-white/10 dark:border-white/10 shadow-xl fade-in-up">
                        <h3 class="text-xl font-semibold mb-4 text-[#1b1b18] dark:text-[#EDEDEC]">Technologies</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($project->technologies as $tech)
                                <span class="px-4 py-2 backdrop-blur-sm bg-cyan-500/10 dark:bg-cyan-500/10 border border-cyan-500/20 dark:border-cyan-500/20 rounded-full text-sm text-cyan-400 dark:text-cyan-400">
                                    {{ $tech }}
                                </span>
                            @endforeach
                        </div>
                    </div>

                    <!-- Links -->
                    <div class="backdrop-blur-md bg-white/5 dark:bg-white/5 rounded-2xl p-6 border border-white/10 dark:border-white/10 shadow-xl fade-in-up">
                        <h3 class="text-xl font-semibold mb-4 text-[#1b1b18] dark:text-[#EDEDEC]">Links</h3>
                        <div class="space-y-3">
                            @if($project->project_url)
                                <a href="{{ $project->project_url }}" target="_blank" class="flex items-center justify-between w-full px-4 py-3 backdrop-blur-sm bg-white/5 dark:bg-white/5 border border-white/10 dark:border-white/10 rounded-lg hover:bg-white/10 dark:hover:bg-white/10 transition-all group">
                                    <span class="text-[#1b1b18] dark:text-[#EDEDEC] group-hover:text-cyan-400 transition-colors">View Project</span>
                                    <svg class="w-5 h-5 text-[#706f6c] dark:text-[#A1A09A] group-hover:text-cyan-400 transform group-hover:translate-x-1 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                    </svg>
                                </a>
                            @endif
                            @if($project->github_url)
                                <a href="{{ $project->github_url }}" target="_blank" class="flex items-center justify-between w-full px-4 py-3 backdrop-blur-sm bg-white/5 dark:bg-white/5 border border-white/10 dark:border-white/10 rounded-lg hover:bg-white/10 dark:hover:bg-white/10 transition-all group">
                                    <span class="text-[#1b1b18] dark:text-[#EDEDEC] group-hover:text-cyan-400 transition-colors">View Code</span>
                                    <svg class="w-5 h-5 text-[#706f6c] dark:text-[#A1A09A] group-hover:text-cyan-400 transform group-hover:translate-x-1 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                    </svg>
                                </a>
                            @endif
                            @if($project->demo_url)
                                <a href="{{ $project->demo_url }}" target="_blank" class="flex items-center justify-between w-full px-4 py-3 backdrop-blur-sm bg-cyan-500/20 dark:bg-cyan-500/20 border border-cyan-500/30 dark:border-cyan-500/30 rounded-lg hover:bg-cyan-500/30 dark:hover:bg-cyan-500/30 transition-all group">
                                    <span class="text-cyan-400 dark:text-cyan-400 font-medium">View Demo</span>
                                    <svg class="w-5 h-5 text-cyan-400 dark:text-cyan-400 transform group-hover:translate-x-1 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
