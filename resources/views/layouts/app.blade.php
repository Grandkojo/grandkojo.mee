<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description', 'Portfolio of Ernest Kojo Owusu Essien - Software Developer')">

    <title>@yield('title', 'Grandkojo | Portfolio')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('favicon/favicon-96x96.png') }}" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon/favicon.svg') }}" />
    <link rel="shortcut icon" href="{{ asset('favicon/favicon.ico') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}" />
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('og_title', 'Grandkojo | Ernest Kojo Owusu Essien - Software Developer')">
    <meta property="og:description" content="@yield('og_description', 'Full-stack developer specializing in Laravel, React, Django, and modern web apps. Building solutions for creatives and businesses in Ghana and beyond.')">
    <meta property="og:image" content="@yield('og_image', asset('images/og-preview.jpg'))">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:site_name" content="Grandkojo Portfolio">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="@yield('twitter_title', 'Grandkojo | Ernest Kojo Owusu Essien - Software Developer')">
    <meta name="twitter:description" content="@yield('twitter_description', 'Full-stack developer specializing in Laravel, React, Django, and modern web apps. Building solutions for creatives and businesses in Ghana and beyond.')">
    <meta name="twitter:image" content="@yield('twitter_image', asset('images/og-preview.jpg'))">

    <!-- Canonical -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/common.js'])
    
    @stack('styles')
</head>
<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] overflow-x-hidden">
    <!-- Animated Mesh Gradient Background -->
    <div class="fixed inset-0 -z-10 overflow-hidden pointer-events-none">
        <div id="mesh-gradient" class="absolute inset-0 opacity-40"></div>
        <div class="absolute inset-0 bg-[#FDFDFC] dark:bg-[#0a0a0a]"></div>
    </div>

    <!-- Mouse Tracking Cursor Effect -->
    <div id="cursor-dot" class="fixed pointer-events-none z-50 transition-opacity duration-300"></div>
    <div id="cursor-ring" class="fixed pointer-events-none z-50 transition-opacity duration-300"></div>

    <!-- Dynamic Island Navigation -->
    <nav class="fixed top-4 left-1/2 -translate-x-1/2 z-50 w-auto px-4">
        <!-- Dynamic Island Container -->
        <div id="dynamic-island" class="backdrop-blur-xl bg-white/10 dark:bg-[#0a0a0a]/40 border border-white/20 dark:border-white/20 rounded-full shadow-2xl shadow-black/20 overflow-hidden" style="outline: none !important; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04); -webkit-tap-highlight-color: transparent; -webkit-focus-ring-color: transparent; will-change: opacity;">
            <!-- Mobile: Compact State -->
            <div id="mobile-nav" class="md:hidden flex items-center justify-between px-4 py-2.5 min-w-[140px]">
                <a href="{{ route('portfolio') }}" class="text-sm font-semibold bg-gradient-to-r from-cyan-400 to-purple-400 bg-clip-text text-transparent hover:opacity-80 transition-opacity">Grandkojo</a>
                <button type="button" id="mobile-menu-button" class="ml-3 p-2 rounded-full hover:bg-white/10 dark:hover:bg-white/10 transition-all group active:scale-95">
                    <div class="w-5 h-5 relative">
                        <span id="hamburger-line-1" class="absolute top-0 left-0 w-full h-0.5 bg-[#1b1b18] dark:bg-[#EDEDEC] rounded-full transition-all duration-300 group-hover:bg-cyan-400 origin-center"></span>
                        <span id="hamburger-line-2" class="absolute top-2 left-0 w-full h-0.5 bg-[#1b1b18] dark:bg-[#EDEDEC] rounded-full transition-all duration-300 group-hover:bg-cyan-400 origin-center"></span>
                        <span id="hamburger-line-3" class="absolute top-4 left-0 w-full h-0.5 bg-[#1b1b18] dark:bg-[#EDEDEC] rounded-full transition-all duration-300 group-hover:bg-cyan-400 origin-center"></span>
                    </div>
                </button>
            </div>

            <!-- Desktop: Expanded State -->
            <div id="desktop-nav" class="hidden md:flex items-center space-x-1 px-6 py-3">
                <a href="{{ route('portfolio') }}" class="text-sm font-semibold bg-gradient-to-r from-cyan-400 to-purple-400 bg-clip-text text-transparent mr-2 hover:opacity-80 transition-opacity">Grandkojo</a>
                <div class="h-4 w-px bg-white/20 mx-2"></div>
                <a href="{{ route('portfolio') }}#about" class="px-4 py-2 text-sm hover:text-cyan-400 dark:hover:text-cyan-400 transition-colors rounded-full hover:bg-white/5 dark:hover:bg-white/5 relative group @if(isset($activeNav) && $activeNav === 'about') text-cyan-400 dark:text-cyan-400 bg-white/5 dark:bg-white/5 @endif">
                    About
                    <span class="absolute bottom-0 left-1/2 -translate-x-1/2 @if(isset($activeNav) && $activeNav === 'about') w-3/4 @else w-0 @endif h-0.5 bg-gradient-to-r from-cyan-400 to-purple-400 group-hover:w-3/4 transition-all duration-300 rounded-full"></span>
                </a>
                <a href="{{ route('portfolio') }}#resume" class="px-4 py-2 text-sm hover:text-cyan-400 dark:hover:text-cyan-400 transition-colors rounded-full hover:bg-white/5 dark:hover:bg-white/5 relative group @if(isset($activeNav) && $activeNav === 'resume') text-cyan-400 dark:text-cyan-400 bg-white/5 dark:bg-white/5 @endif">
                    Resume
                    <span class="absolute bottom-0 left-1/2 -translate-x-1/2 @if(isset($activeNav) && $activeNav === 'resume') w-3/4 @else w-0 @endif h-0.5 bg-gradient-to-r from-cyan-400 to-purple-400 group-hover:w-3/4 transition-all duration-300 rounded-full"></span>
                </a>
                <a href="{{ route('portfolio') }}#projects" class="px-4 py-2 text-sm hover:text-cyan-400 dark:hover:text-cyan-400 transition-colors rounded-full hover:bg-white/5 dark:hover:bg-white/5 relative group @if(isset($activeNav) && $activeNav === 'projects') text-cyan-400 dark:text-cyan-400 bg-white/5 dark:bg-white/5 @endif">
                    Projects
                    <span class="absolute bottom-0 left-1/2 -translate-x-1/2 @if(isset($activeNav) && $activeNav === 'projects') w-3/4 @else w-0 @endif h-0.5 bg-gradient-to-r from-cyan-400 to-purple-400 group-hover:w-3/4 transition-all duration-300 rounded-full"></span>
                </a>
                <a href="{{ route('services') }}" class="px-4 py-2 text-sm hover:text-cyan-400 dark:hover:text-cyan-400 transition-colors rounded-full hover:bg-white/5 dark:hover:bg-white/5 relative group @if(isset($activeNav) && $activeNav === 'services') text-cyan-400 dark:text-cyan-400 bg-white/5 dark:bg-white/5 @endif">
                    Services
                    <span class="absolute bottom-0 left-1/2 -translate-x-1/2 @if(isset($activeNav) && $activeNav === 'services') w-3/4 @else w-0 @endif h-0.5 bg-gradient-to-r from-cyan-400 to-purple-400 group-hover:w-3/4 transition-all duration-300 rounded-full"></span>
                </a>
                <a href="{{ route('portfolio') }}#contact" class="px-4 py-2 text-sm hover:text-cyan-400 dark:hover:text-cyan-400 transition-colors rounded-full hover:bg-white/5 dark:hover:bg-white/5 relative group @if(isset($activeNav) && $activeNav === 'contact') text-cyan-400 dark:text-cyan-400 bg-white/5 dark:bg-white/5 @endif">
                    Contact
                    <span class="absolute bottom-0 left-1/2 -translate-x-1/2 @if(isset($activeNav) && $activeNav === 'contact') w-3/4 @else w-0 @endif h-0.5 bg-gradient-to-r from-cyan-400 to-purple-400 group-hover:w-3/4 transition-all duration-300 rounded-full"></span>
                </a>
            </div>
        </div>

        <!-- Mobile Menu Overlay -->
        <div id="mobile-menu" class="hidden md:hidden fixed inset-0 z-40">
            <!-- Dark overlay -->
            <div class="absolute transition-opacity duration-300" id="menu-overlay"></div>
            
            <!-- Menu content - Dynamic Island Style -->
            <div>
                <div id="menu-content" class="backdrop-blur-xl bg-white/10 dark:bg-[#0a0a0a]/40 border border-white/20 dark:border-white/20 rounded-3xl shadow-2xl overflow-hidden transform transition-all duration-500 scale-95 opacity-0 w-[280px] absolute left-[-65px] top-20 mx-4">
                    <div class="px-6 py-5 space-y-1">
                        <a href="{{ route('portfolio') }}#about" class="block px-4 py-3 text-base font-medium text-[#1b1b18] dark:text-[#EDEDEC] hover:text-cyan-400 rounded-xl hover:bg-white/5 dark:hover:bg-white/5 transition-all transform hover:scale-[1.02]">About</a>
                        <a href="{{ route('portfolio') }}#resume" class="block px-4 py-3 text-base font-medium text-[#1b1b18] dark:text-[#EDEDEC] hover:text-cyan-400 rounded-xl hover:bg-white/5 dark:hover:bg-white/5 transition-all transform hover:scale-[1.02]">Resume</a>
                        <a href="{{ route('portfolio') }}#projects" class="block px-4 py-3 text-base font-medium text-[#1b1b18] dark:text-[#EDEDEC] hover:text-cyan-400 rounded-xl hover:bg-white/5 dark:hover:bg-white/5 transition-all transform hover:scale-[1.02]">Projects</a>
                        <a href="{{ route('services') }}" class="block px-4 py-3 text-base font-medium text-[#1b1b18] dark:text-[#EDEDEC] hover:text-cyan-400 rounded-xl hover:bg-white/5 dark:hover:bg-white/5 transition-all transform hover:scale-[1.02]">Services</a>
                        <a href="{{ route('portfolio') }}#contact" class="block px-4 py-3 text-base font-medium text-[#1b1b18] dark:text-[#EDEDEC] hover:text-cyan-400 rounded-xl hover:bg-white/5 dark:hover:bg-white/5 transition-all transform hover:scale-[1.02]">Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    @yield('content')

    <!-- Footer -->
    <footer class="py-8 px-4 sm:px-6 lg:px-8 border-t border-white/10 dark:border-white/10 backdrop-blur-sm bg-white/5 dark:bg-white/5">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">© 2024 Grandkojo. All rights reserved.</p>
                </div>
                <div class="flex space-x-6">
                    <a href="https://github.com/Grandkojo" class="text-[#706f6c] dark:text-[#A1A09A] hover:text-cyan-400 dark:hover:text-cyan-400 transition-colors transform hover:scale-110">
                        <span class="sr-only">GitHub</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="https://www.linkedin.com/in/ernest-essien-kojo" class="text-[#706f6c] dark:text-[#A1A09A] hover:text-cyan-400 dark:hover:text-cyan-400 transition-colors transform hover:scale-110">
                        <span class="sr-only">LinkedIn</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                        </svg>
                    </a>
                    <a href="https://x.com/grandkojo" class="text-[#706f6c] dark:text-[#A1A09A] hover:text-cyan-400 dark:hover:text-cyan-400 transition-colors transform hover:scale-110">
                        <span class="sr-only">Twitter</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>

