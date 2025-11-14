<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $project->title }} - Project by Ernest Kojo Owusu Essien">

    <title>{{ $project->title }} | Grandkojo</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('favicon/favicon-96x96.png') }}" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon/favicon.svg') }}" />
    <link rel="shortcut icon" href="{{ asset('favicon/favicon.ico') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}" />
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC]">
    <!-- Animated Background Layers -->
    <div class="fixed inset-0 -z-10 overflow-hidden pointer-events-none">
        <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/5 via-purple-500/5 to-teal-500/5 animate-gradient-shift"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_20%,rgba(6,182,212,0.1),transparent_50%)] parallax-layer-1"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_70%_80%,rgba(168,85,247,0.1),transparent_50%)] parallax-layer-2"></div>
    </div>

    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 z-50 backdrop-blur-md bg-white/10 dark:bg-[#0a0a0a]/30 border-b border-white/10 dark:border-white/10 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('portfolio') }}" class="text-xl font-semibold bg-gradient-to-r from-cyan-400 to-purple-400 bg-clip-text text-transparent hover:opacity-80 transition-opacity">Grandkojo</a>
                </div>
                
                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-4">
                    <a href="{{ route('portfolio') }}#about" class="text-sm hover:text-cyan-400 dark:hover:text-cyan-400 transition-colors">About</a>
                    <a href="{{ route('portfolio') }}#resume" class="text-sm hover:text-cyan-400 dark:hover:text-cyan-400 transition-colors">Resume</a>
                    <a href="{{ route('portfolio') }}#projects" class="text-sm hover:text-cyan-400 dark:hover:text-cyan-400 transition-colors">Projects</a>
                    <a href="{{ route('portfolio') }}#contact" class="text-sm hover:text-cyan-400 dark:hover:text-cyan-400 transition-colors">Contact</a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button type="button" id="mobile-menu-button" class="text-[#1b1b18] dark:text-[#EDEDEC] hover:text-cyan-400 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden fixed inset-0 z-50">
            <div class="absolute inset-0 bg-black/50 backdrop-blur-sm transition-opacity duration-300"></div>
            <div class="relative h-full w-full backdrop-blur-md bg-white/10 dark:bg-[#0a0a0a]/30">
                <div class="flex justify-end p-4">
                    <button type="button" id="close-menu-button" class="text-[#1b1b18] dark:text-[#EDEDEC] hover:text-cyan-400 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="px-4 pt-2 pb-3 space-y-1">
                    <a href="{{ route('portfolio') }}#about" class="block px-3 py-2 text-base font-medium text-[#1b1b18] dark:text-[#EDEDEC] hover:text-cyan-400 transition-colors">About</a>
                    <a href="{{ route('portfolio') }}#resume" class="block px-3 py-2 text-base font-medium text-[#1b1b18] dark:text-[#EDEDEC] hover:text-cyan-400 transition-colors">Resume</a>
                    <a href="{{ route('portfolio') }}#projects" class="block px-3 py-2 text-base font-medium text-[#1b1b18] dark:text-[#EDEDEC] hover:text-cyan-400 transition-colors">Projects</a>
                    <a href="{{ route('portfolio') }}#contact" class="block px-3 py-2 text-base font-medium text-[#1b1b18] dark:text-[#EDEDEC] hover:text-cyan-400 transition-colors">Contact</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const closeMenuButton = document.getElementById('close-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            const mobileMenuLinks = mobileMenu.querySelectorAll('a');

            function toggleMenu() {
                mobileMenu.classList.toggle('hidden');
                document.body.style.overflow = mobileMenu.classList.contains('hidden') ? '' : 'hidden';
            }

            mobileMenuButton.addEventListener('click', toggleMenu);
            closeMenuButton.addEventListener('click', toggleMenu);

            mobileMenuLinks.forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.classList.add('hidden');
                    document.body.style.overflow = '';
                });
            });

            mobileMenu.addEventListener('click', (e) => {
                if (e.target === mobileMenu) {
                    toggleMenu();
                }
            });
        });
    </script>

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
                            src="{{ asset('images/image-placeholder.jpg') }}" 
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

    <!-- Footer -->
    <footer class="py-8 px-4 sm:px-6 lg:px-8 border-t border-white/10 dark:border-white/10 backdrop-blur-sm bg-white/5 dark:bg-white/5">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">© 2024 Grandkojo. All rights reserved.</p>
                </div>
                <div class="flex space-x-6">
                    <a href="https://github.com/Grandkojo" class="text-[#706f6c] dark:text-[#A1A09A] hover:text-cyan-400 dark:hover:text-cyan-400 transition-colors">
                        <span class="sr-only">GitHub</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="https://www.linkedin.com/in/ernest-essien-kojo" class="text-[#706f6c] dark:text-[#A1A09A] hover:text-cyan-400 dark:hover:text-cyan-400 transition-colors">
                        <span class="sr-only">LinkedIn</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                        </svg>
                    </a>
                    <a href="https://x.com/grandkojo" class="text-[#706f6c] dark:text-[#A1A09A] hover:text-cyan-400 dark:hover:text-cyan-400 transition-colors">
                        <span class="sr-only">Twitter</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>

