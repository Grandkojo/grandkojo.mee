<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Portfolio of Ernest Kojo Owusu Essien - Software Developer">

    <title>Grandkojo | Portfolio</title>

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
<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] overflow-x-hidden">
    <!-- Animated Background Layers -->
    <div class="fixed inset-0 -z-10 overflow-hidden pointer-events-none">
        <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/5 via-purple-500/5 to-teal-500/5 animate-gradient-shift"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_20%,rgba(6,182,212,0.1),transparent_50%)] parallax-layer-1"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_70%_80%,rgba(168,85,247,0.1),transparent_50%)] parallax-layer-2"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(20,184,166,0.08),transparent_60%)] parallax-layer-3"></div>
    </div>

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
                <a href="#about" class="px-4 py-2 text-sm hover:text-cyan-400 dark:hover:text-cyan-400 transition-colors rounded-full hover:bg-white/5 dark:hover:bg-white/5 relative group">
                    About
                    <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-0.5 bg-gradient-to-r from-cyan-400 to-purple-400 group-hover:w-3/4 transition-all duration-300 rounded-full"></span>
                </a>
                <a href="#resume" class="px-4 py-2 text-sm hover:text-cyan-400 dark:hover:text-cyan-400 transition-colors rounded-full hover:bg-white/5 dark:hover:bg-white/5 relative group">
                    Resume
                    <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-0.5 bg-gradient-to-r from-cyan-400 to-purple-400 group-hover:w-3/4 transition-all duration-300 rounded-full"></span>
                </a>
                <a href="#projects" class="px-4 py-2 text-sm hover:text-cyan-400 dark:hover:text-cyan-400 transition-colors rounded-full hover:bg-white/5 dark:hover:bg-white/5 relative group">
                    Projects
                    <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-0.5 bg-gradient-to-r from-cyan-400 to-purple-400 group-hover:w-3/4 transition-all duration-300 rounded-full"></span>
                </a>
                <a href="#contact" class="px-4 py-2 text-sm hover:text-cyan-400 dark:hover:text-cyan-400 transition-colors rounded-full hover:bg-white/5 dark:hover:bg-white/5 relative group">
                    Contact
                    <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-0.5 bg-gradient-to-r from-cyan-400 to-purple-400 group-hover:w-3/4 transition-all duration-300 rounded-full"></span>
                </a>
            </div>
        </div>

        <!-- Mobile Menu Overlay -->
        <div id="mobile-menu" class="hidden md:hidden fixed inset-0 z-40">
            <!-- Dark overlay -->
            <div class="absolute inset-0 bg-black/50 backdrop-blur-sm transition-opacity duration-300" id="menu-overlay"></div>
            
            <!-- Menu content - Dynamic Island Style -->
            <div class="relative flex justify-center pt-20">
                <div id="menu-content" class="backdrop-blur-xl bg-white/10 dark:bg-[#0a0a0a]/40 border border-white/20 dark:border-white/20 rounded-3xl shadow-2xl overflow-hidden transform transition-all duration-500 scale-95 opacity-0 max-w-[280px] w-full mx-4">
                    <div class="px-6 py-5 space-y-1">
                        <a href="#about" class="block px-4 py-3 text-base font-medium text-[#1b1b18] dark:text-[#EDEDEC] hover:text-cyan-400 rounded-xl hover:bg-white/5 dark:hover:bg-white/5 transition-all transform hover:scale-[1.02]">About</a>
                        <a href="#resume" class="block px-4 py-3 text-base font-medium text-[#1b1b18] dark:text-[#EDEDEC] hover:text-cyan-400 rounded-xl hover:bg-white/5 dark:hover:bg-white/5 transition-all transform hover:scale-[1.02]">Resume</a>
                        <a href="#projects" class="block px-4 py-3 text-base font-medium text-[#1b1b18] dark:text-[#EDEDEC] hover:text-cyan-400 rounded-xl hover:bg-white/5 dark:hover:bg-white/5 transition-all transform hover:scale-[1.02]">Projects</a>
                        <a href="#contact" class="block px-4 py-3 text-base font-medium text-[#1b1b18] dark:text-[#EDEDEC] hover:text-cyan-400 rounded-xl hover:bg-white/5 dark:hover:bg-white/5 transition-all transform hover:scale-[1.02]">Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Dynamic Island JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            const menuContent = document.getElementById('menu-content');
            const menuOverlay = document.getElementById('menu-overlay');
            const dynamicIsland = document.getElementById('dynamic-island');
            const hamburgerLine1 = document.getElementById('hamburger-line-1');
            const hamburgerLine2 = document.getElementById('hamburger-line-2');
            const hamburgerLine3 = document.getElementById('hamburger-line-3');
            const mobileMenuLinks = mobileMenu.querySelectorAll('a');
            let isMenuOpen = false;

            function closeMenu() {
                if (!isMenuOpen) return;
                isMenuOpen = false;
                
                // Close menu
                menuContent.style.transition = 'all 0.3s ease-in';
                menuContent.style.transform = 'scale(0.95)';
                menuContent.style.opacity = '0';
                
                // Reset hamburger animation properly - remove inline styles to restore Tailwind classes
                hamburgerLine1.style.removeProperty('transform');
                hamburgerLine1.style.removeProperty('top');
                hamburgerLine2.style.removeProperty('opacity');
                hamburgerLine2.style.removeProperty('transform');
                hamburgerLine3.style.removeProperty('transform');
                hamburgerLine3.style.removeProperty('top');
                
                // Reset dynamic island - remove inline styles
                dynamicIsland.style.removeProperty('width');
                dynamicIsland.style.removeProperty('min-width');
                
                setTimeout(() => {
                    mobileMenu.classList.add('hidden');
                    document.body.style.overflow = '';
                }, 300);
            }

            function openMenu() {
                if (isMenuOpen) return;
                isMenuOpen = true;
                
                // Open menu
                mobileMenu.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
                
                // Animate hamburger to X with smooth transition
                setTimeout(() => {
                    hamburgerLine1.style.transform = 'rotate(45deg) translateY(8px)';
                    hamburgerLine1.style.top = '8px';
                    hamburgerLine2.style.opacity = '0';
                    hamburgerLine2.style.transform = 'scaleX(0)';
                    hamburgerLine3.style.transform = 'rotate(-45deg) translateY(-8px)';
                    hamburgerLine3.style.top = '8px';
                }, 10);
                
                // Expand dynamic island with smooth animation
                dynamicIsland.style.width = 'auto';
                dynamicIsland.style.minWidth = '140px';
                
                // Animate menu content with spring-like effect
                requestAnimationFrame(() => {
                    menuContent.style.transition = 'all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1)';
                    menuContent.style.transform = 'scale(1)';
                    menuContent.style.opacity = '1';
                });
            }

            function toggleMenu() {
                if (isMenuOpen) {
                    closeMenu();
                } else {
                    openMenu();
                }
            }

            mobileMenuButton.addEventListener('click', (e) => {
                e.stopPropagation();
                toggleMenu();
            });

            // Close menu when clicking overlay
            menuOverlay.addEventListener('click', closeMenu);
            
            // Close menu when clicking outside the menu content
            mobileMenu.addEventListener('click', (e) => {
                // Don't close if clicking on menu content or hamburger button
                const clickedOnMenuContent = e.target.closest('#menu-content');
                const clickedOnButton = e.target.closest('#mobile-menu-button');
                
                if (!clickedOnMenuContent && !clickedOnButton) {
                    closeMenu();
                }
            });

            // Close menu when clicking a link
            mobileMenuLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    e.stopPropagation();
                    closeMenu();
                });
            });
            
            // Close menu on escape key
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && isMenuOpen) {
                    closeMenu();
                }
            });

            // Dynamic island scroll effect - disabled to prevent rendering artifacts
            // The dynamic island will remain static during scroll to avoid any visual glitches
        });
    </script>

    <!-- Hero Section -->
    <section class="pt-32 md:pt-36 pb-16 px-4 sm:px-6 lg:px-8 relative">
        <div class="max-w-7xl mx-auto">
            <div class="text-center fade-in">
                <div class="mb-8 flex justify-center">
                    <div class="relative w-48 h-48 sm:w-64 sm:h-64 rounded-full overflow-hidden border-4 border-white/20 dark:border-white/20 backdrop-blur-sm shadow-2xl ring-4 ring-cyan-500/20 dark:ring-cyan-500/20">
                        <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/20 to-purple-500/20"></div>
                        <img 
                            src="{{ asset('images/profile1.jpg') }}" 
                            alt="avi"
                            class="w-full h-full object-cover relative z-10"
                            onerror="this.src='https://ui-avatars.com/api/?name=Ernest+Kojo&background=1b1b18&color=fff&size=256'"
                        >
                    </div>
                </div>
                <div class="inline-flex items-center space-x-3 mb-4 fade-in-up">
                    <span class="text-[#706f6c] dark:text-[#A1A09A] text-lg font-medium tracking-wide">Hola, I'm</span>
                    <div class="h-px w-12 bg-gradient-to-r from-cyan-400 to-purple-400"></div>
                </div>
                <h1 class="text-5xl md:text-6xl font-bold mb-6 bg-gradient-to-r from-cyan-400 via-purple-400 to-teal-400 bg-clip-text text-transparent fade-in-up">Ernest Kojo Owusu Essien</h1>
                <p class="text-xl text-[#706f6c] dark:text-[#A1A09A] mb-8 fade-in-up">Software Engineer & Problem Solver</p>
                <div class="flex justify-center space-x-4 fade-in-up">
                    <a href="#contact" class="px-6 py-3 backdrop-blur-md bg-gradient-to-r from-cyan-500 to-purple-500 text-white rounded-lg hover:shadow-lg hover:shadow-cyan-500/50 transition-all transform hover:scale-105">Get in Touch</a>
                    <a href="#projects" class="px-6 py-3 backdrop-blur-md bg-white/5 dark:bg-white/5 border border-white/10 dark:border-white/10 rounded-lg hover:bg-white/10 dark:hover:bg-white/10 transition-all transform hover:scale-105">View Projects</a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 relative">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-12 bg-gradient-to-r from-cyan-400 to-purple-400 bg-clip-text text-transparent fade-in">About Me</h2>
            <div class="max-w-3xl mx-auto">
                <div class="backdrop-blur-md bg-white/5 dark:bg-white/5 rounded-2xl shadow-xl border border-white/10 dark:border-white/10 p-8 mb-12 fade-in-up hover:shadow-2xl hover:shadow-cyan-500/10 transition-all duration-300">
                    <p class="text-lg text-[#706f6c] dark:text-[#A1A09A] mb-6 leading-relaxed">
                        I'm a Computer Engineering graduate from KNUST, building production-grade software that powers real businesses and communities. From full-stack e-commerce platforms like ZonifyCart to AI-driven internal tools and open-source contributions, I build clean, scalable solutions that solve Ghanaian problems first and scale globally.
                    </p>
                    <p class="text-lg text-[#706f6c] dark:text-[#A1A09A] mb-6 leading-relaxed">
                        I bring battle-tested skills in Python/Django, Laravel, React, Vue, and cloud deployment, backed by hands-on contributions at PyCon Ghana, GDG DevFest, and internships where I turned ideas into live products. I write code that lasts, optimize for performance under real constraints, and design experiences users actually love.
                    </p>
                    <p class="text-lg text-[#706f6c] dark:text-[#A1A09A] leading-relaxed">
                        Currently mentoring emerging developers, growing Becc Academy, and actively seeking the next opportunity—whether that's joining a world-class team or scaling innovative products from West Africa to global markets.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Resume Section -->
    <section id="resume" class="py-20 relative">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-16 bg-gradient-to-r from-cyan-400 to-purple-400 bg-clip-text text-transparent fade-in">Resume</h2>
            <div class="max-w-5xl mx-auto">
                <!-- Experience -->
                <div class="mb-16">
                    <h3 class="text-2xl font-semibold mb-8 text-[#1b1b18] dark:text-[#EDEDEC] flex items-center gap-3">
                        <div class="w-1 h-8 bg-gradient-to-b from-cyan-400 to-purple-400 rounded-full"></div>
                        Experience
                    </h3>
                    <div class="relative">
                        <!-- Timeline line -->
                        <div class="absolute left-8 top-0 bottom-0 w-0.5 bg-gradient-to-b from-cyan-500/30 via-purple-500/30 to-teal-500/30 hidden md:block"></div>
                        <div class="space-y-8">
                            @foreach($resumeItems->where('type', 'experience') as $index => $item)
                            <div class="relative fade-in-up timeline-item" style="animation-delay: {{ $index * 0.15 }}s">
                                <!-- Timeline dot -->
                                <div class="absolute left-0 md:left-6 top-6 w-4 h-4 rounded-full bg-gradient-to-r from-cyan-400 to-purple-400 ring-4 ring-white/10 dark:ring-white/10 backdrop-blur-sm z-10 hidden md:block"></div>
                                <div class="ml-0 md:ml-16 backdrop-blur-md bg-white/5 dark:bg-white/5 rounded-2xl shadow-xl border border-white/10 dark:border-white/10 p-6 hover:shadow-2xl hover:shadow-cyan-500/10 transition-all duration-300 transform hover:scale-[1.02]">
                                    <div class="flex flex-col md:flex-row md:justify-between md:items-start mb-4 gap-2">
                                        <div>
                                            <h4 class="text-lg font-semibold text-[#1b1b18] dark:text-[#EDEDEC] mb-1">{{ $item->title }}</h4>
                                            <p class="text-cyan-400 dark:text-cyan-400 font-medium">{{ $item->organization }}</p>
                                        </div>
                                        <div class="text-left md:text-right">
                                            <p class="text-sm text-[#706f6c] dark:text-[#A1A09A] font-medium">
                                                {{ $item->start_date->format('M Y') }} - {{ $item->end_date ? $item->end_date->format('M Y') : 'Present' }}
                                            </p>
                                            @if($item->location)
                                                <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">{{ $item->location }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    @if($item->description)
                                        <p class="text-[#706f6c] dark:text-[#A1A09A] leading-relaxed">{{ $item->description }}</p>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Education -->
                <div class="mb-16">
                    <h3 class="text-2xl font-semibold mb-8 text-[#1b1b18] dark:text-[#EDEDEC] flex items-center gap-3">
                        <div class="w-1 h-8 bg-gradient-to-b from-purple-400 to-teal-400 rounded-full"></div>
                        Education
                    </h3>
                    <div class="relative">
                        <div class="absolute left-8 top-0 bottom-0 w-0.5 bg-gradient-to-b from-purple-500/30 via-teal-500/30 to-cyan-500/30 hidden md:block"></div>
                        <div class="space-y-8">
                            @foreach($resumeItems->where('type', 'education') as $index => $item)
                            <div class="relative fade-in-up timeline-item" style="animation-delay: {{ $index * 0.15 }}s">
                                <div class="absolute left-0 md:left-6 top-6 w-4 h-4 rounded-full bg-gradient-to-r from-purple-400 to-teal-400 ring-4 ring-white/10 dark:ring-white/10 backdrop-blur-sm z-10 hidden md:block"></div>
                                <div class="ml-0 md:ml-16 backdrop-blur-md bg-white/5 dark:bg-white/5 rounded-2xl shadow-xl border border-white/10 dark:border-white/10 p-6 hover:shadow-2xl hover:shadow-purple-500/10 transition-all duration-300 transform hover:scale-[1.02]">
                                    <div class="flex flex-col md:flex-row md:justify-between md:items-start mb-4 gap-2">
                                        <div>
                                            <h4 class="text-lg font-semibold text-[#1b1b18] dark:text-[#EDEDEC] mb-1">{{ $item->title }}</h4>
                                            <p class="text-purple-400 dark:text-purple-400 font-medium">{{ $item->organization }}</p>
                                        </div>
                                        <div class="text-left md:text-right">
                                            <p class="text-sm text-[#706f6c] dark:text-[#A1A09A] font-medium">
                                                {{ $item->start_date->format('M Y') }} - {{ $item->end_date ? $item->end_date->format('M Y') : 'Present' }}
                                            </p>
                                            @if($item->location)
                                                <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">{{ $item->location }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    @if($item->description)
                                        <p class="text-[#706f6c] dark:text-[#A1A09A] leading-relaxed">{{ $item->description }}</p>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Certifications -->
                <div>
                    <h3 class="text-2xl font-semibold mb-8 text-[#1b1b18] dark:text-[#EDEDEC] flex items-center gap-3">
                        <div class="w-1 h-8 bg-gradient-to-b from-teal-400 to-cyan-400 rounded-full"></div>
                        Certifications
                    </h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        @foreach($resumeItems->where('type', 'certification') as $index => $item)
                        <div class="backdrop-blur-md bg-white/5 dark:bg-white/5 rounded-2xl shadow-xl border border-white/10 dark:border-white/10 p-6 hover:shadow-2xl hover:shadow-teal-500/10 transition-all duration-300 transform hover:scale-[1.02] fade-in-up" style="animation-delay: {{ $index * 0.1 }}s">
                            <div class="flex flex-col mb-4">
                                <h4 class="text-lg font-semibold text-[#1b1b18] dark:text-[#EDEDEC] mb-1">{{ $item->title }}</h4>
                                <p class="text-teal-400 dark:text-teal-400 font-medium mb-2">{{ $item->organization }}</p>
                                <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">
                                    {{ $item->start_date->format('M Y') }} - {{ $item->end_date ? $item->end_date->format('M Y') : 'Present' }}
                                </p>
                                @if($item->location)
                                    <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">{{ $item->location }}</p>
                                @endif
                            </div>
                            @if($item->description)
                                <p class="text-[#706f6c] dark:text-[#A1A09A] leading-relaxed text-sm">{{ $item->description }}</p>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="py-20 relative">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-12 bg-gradient-to-r from-cyan-400 to-purple-400 bg-clip-text text-transparent fade-in">My Skills</h2>
            <div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4 max-w-4xl mx-auto">
                @foreach($skills as $index => $skill)
                <div class="backdrop-blur-md bg-white/5 dark:bg-white/5 rounded-xl shadow-lg border border-white/10 dark:border-white/10 p-4 flex items-center justify-center max-w-[120px] mx-auto w-full hover:shadow-xl hover:shadow-cyan-500/20 transition-all duration-300 transform hover:scale-110 hover:-translate-y-1 fade-in-up" style="animation-delay: {{ $index * 0.05 }}s">
                    <div class="flex flex-col items-center text-center">
                        <h3 class="text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] hover:text-cyan-400 transition-colors">{{ $skill->name }}</h3>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-4xl font-bold mb-12 text-center bg-gradient-to-r from-cyan-400 to-purple-400 bg-clip-text text-transparent fade-in">Featured Projects</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($projects as $index => $project)
                <a href="{{ route('project.show', $project->id) }}" class="group project-card fade-in-up" style="animation-delay: {{ $index * 0.1 }}s">
                    <div class="backdrop-blur-md bg-white/5 dark:bg-white/5 rounded-2xl overflow-hidden border border-white/10 dark:border-white/10 shadow-xl hover:shadow-2xl hover:shadow-cyan-500/20 transition-all duration-300 transform hover:scale-105 hover:-translate-y-2 h-full flex flex-col">
                        @if($project->featured_image)
                            <div class="aspect-video bg-gradient-to-br from-cyan-500/10 to-purple-500/10 overflow-hidden relative">
                                <img src="{{ asset('images/project-imgs/' . $project->featured_image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            </div>
                        @else
                            <div class="aspect-video bg-gradient-to-br from-cyan-500/10 via-purple-500/10 to-teal-500/10 flex items-center justify-center">
                                <div class="w-16 h-16 rounded-full backdrop-blur-sm bg-white/10 border border-white/20 flex items-center justify-center">
                                    <svg class="w-8 h-8 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                    </svg>
                                </div>
                            </div>
                        @endif
                        <div class="p-6 flex-1 flex flex-col">
                            <h3 class="font-semibold mb-2 text-lg text-[#1b1b18] dark:text-[#EDEDEC] group-hover:text-cyan-400 transition-colors">{{ $project->title }}</h3>
                            <p class="text-sm text-[#706f6c] dark:text-[#A1A09A] mb-4 line-clamp-3 flex-1">
                                {{ Str::limit($project->description, 120) }}
                            </p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                @foreach(array_slice($project->technologies, 0, 3) as $tech)
                                    <span class="px-3 py-1 text-xs backdrop-blur-sm bg-cyan-500/10 dark:bg-cyan-500/10 border border-cyan-500/20 dark:border-cyan-500/20 rounded-full text-cyan-400 dark:text-cyan-400">{{ $tech }}</span>
                                @endforeach
                                @if(count($project->technologies) > 3)
                                    <span class="px-3 py-1 text-xs backdrop-blur-sm bg-white/5 dark:bg-white/5 border border-white/10 dark:border-white/10 rounded-full text-[#706f6c] dark:text-[#A1A09A]">+{{ count($project->technologies) - 3 }}</span>
                                @endif
                            </div>
                            <div class="mt-auto flex gap-3 flex-wrap">
                                @if($project->project_url)
                                    <a href="{{ $project->project_url }}" target="_blank" onclick="event.stopPropagation()" class="text-sm text-[#1b1b18] dark:text-[#EDEDEC] hover:text-cyan-400 transition-colors flex items-center gap-1">
                                        <span>View Project</span>
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                        </svg>
                                    </a>
                                @endif
                                @if($project->github_url)
                                    <a href="{{ $project->github_url }}" target="_blank" onclick="event.stopPropagation()" class="text-sm text-[#1b1b18] dark:text-[#EDEDEC] hover:text-cyan-400 transition-colors flex items-center gap-1">
                                        <span>View Code</span>
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                        </svg>
                                    </a>
                                @endif
                                @if($project->demo_url)
                                    <a href="{{ $project->demo_url }}" target="_blank" onclick="event.stopPropagation()" class="text-sm text-cyan-400 hover:text-cyan-300 transition-colors flex items-center gap-1 font-medium">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>View Demo</span>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-16 px-4 sm:px-6 lg:px-8 relative">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-4xl font-bold mb-12 text-center bg-gradient-to-r from-cyan-400 to-purple-400 bg-clip-text text-transparent fade-in">Get in Touch</h2>
            <div class="max-w-2xl mx-auto">
                <!-- Success Message -->
                <div id="success-message" class="hidden mb-6 p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-600 dark:text-green-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <p class="text-green-800 dark:text-green-200 font-medium">Email sent successfully! I'll get back to you soon.</p>
                    </div>
                </div>

                <!-- Error Message -->
                <div id="error-message" class="hidden mb-6 p-4 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-red-600 dark:text-red-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                        </svg>
                        <p class="text-red-800 dark:text-red-200 font-medium" id="error-text">Something went wrong. Please try again.</p>
                    </div>
                </div>

                <div class="backdrop-blur-md bg-white/5 dark:bg-white/5 rounded-2xl shadow-xl border border-white/10 dark:border-white/10 p-8 fade-in-up">
                    <form id="contact-form" class="space-y-6" action="{{ route('send.email') }}" method="POST">
                        @csrf
                        <div>
                            <label for="name" class="block text-sm font-medium mb-2 text-[#1b1b18] dark:text-[#EDEDEC]">Name</label>
                            <input type="text" id="name" name="name" required class="w-full px-4 py-3 rounded-lg backdrop-blur-sm bg-white/5 dark:bg-white/5 border border-white/10 dark:border-white/10 text-[#1b1b18] dark:text-[#EDEDEC] focus:outline-none focus:ring-2 focus:ring-cyan-400/50 transition-all">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium mb-2 text-[#1b1b18] dark:text-[#EDEDEC]">Email</label>
                            <input type="email" id="email" name="email" required class="w-full px-4 py-3 rounded-lg backdrop-blur-sm bg-white/5 dark:bg-white/5 border border-white/10 dark:border-white/10 text-[#1b1b18] dark:text-[#EDEDEC] focus:outline-none focus:ring-2 focus:ring-cyan-400/50 transition-all">
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium mb-2 text-[#1b1b18] dark:text-[#EDEDEC]">Message</label>
                            <textarea id="message" name="message" rows="4" required class="w-full px-4 py-3 rounded-lg backdrop-blur-sm bg-white/5 dark:bg-white/5 border border-white/10 dark:border-white/10 text-[#1b1b18] dark:text-[#EDEDEC] focus:outline-none focus:ring-2 focus:ring-cyan-400/50 transition-all"></textarea>
                        </div>
                        <button type="submit" id="submit-btn" class="w-full px-6 py-3 backdrop-blur-md bg-gradient-to-r from-cyan-500 to-purple-500 text-white rounded-lg hover:shadow-lg hover:shadow-cyan-500/50 transition-all transform hover:scale-[1.02] flex items-center justify-center">
                            <span id="submit-text">Send Message</span>
                            <div id="submit-loader" class="hidden ml-2">
                                <div class="animate-spin rounded-full h-5 w-5 border-b-2 border-white"></div>
                            </div>
                        </button>
                    </form>
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

    <!-- Add this before closing body tag -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // const slide1 = document.getElementById('slide1');
            // const slide2 = document.getElementById('slide2');
            // let currentSlide = 1;

            // function switchSlide() {
            //     if (currentSlide === 1) {
            //         slide1.style.opacity = '0';
            //         slide2.style.opacity = '1';
            //         currentSlide = 2;
            //     } else {
            //         slide1.style.opacity = '1';
            //         slide2.style.opacity = '0';
            //         currentSlide = 1;
            //     }
            // }

            // // Switch slides every 5 seconds
            // setInterval(switchSlide, 5000);

            // // Add touch swipe functionality
            // let touchStartX = 0;
            // let touchEndX = 0;
            
            // document.getElementById('imageSlider').addEventListener('touchstart', e => {
            //     touchStartX = e.changedTouches[0].screenX;
            // });

            // document.getElementById('imageSlider').addEventListener('touchend', e => {
            //     touchEndX = e.changedTouches[0].screenX;
            //     handleSwipe();
            // });

            // function handleSwipe() {
            //     const swipeThreshold = 50;
            //     if (touchEndX < touchStartX - swipeThreshold) {
            //         // Swipe left
            //         switchSlide();
            //     }
            //     if (touchEndX > touchStartX + swipeThreshold) {
            //         // Swipe right
            //         switchSlide();
            //     }
            // }

            // Contact Form AJAX Handling
            const contactForm = document.getElementById('contact-form');
            const submitBtn = document.getElementById('submit-btn');
            const submitText = document.getElementById('submit-text');
            const submitLoader = document.getElementById('submit-loader');
            const successMessage = document.getElementById('success-message');
            const errorMessage = document.getElementById('error-message');
            const errorText = document.getElementById('error-text');

            if (contactForm) {
                contactForm.addEventListener('submit', function(e) {
                    e.preventDefault();

                    // Show loader
                    submitBtn.disabled = true;
                    submitText.textContent = 'Sending...';
                    submitLoader.classList.remove('hidden');
                    
                    // Hide any existing messages
                    successMessage.classList.add('hidden');
                    errorMessage.classList.add('hidden');

                    // Get form data
                    const formData = new FormData(contactForm);

                    // Send AJAX request
                    fetch('{{ route("send.email") }}', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                        }
                    })
                    .then(response => {
                        if (!response.ok) {
                            return response.json().then(data => {
                                throw new Error(data.message || 'Server error');
                            });
                        }
                        return response.json();
                    })
                    .then(data => {
                        // Hide loader
                        submitBtn.disabled = false;
                        submitText.textContent = 'Send Message';
                        submitLoader.classList.add('hidden');

                        if (data.success) {
                            // Show success message
                            successMessage.classList.remove('hidden');
                            contactForm.reset();
                            
                            // Scroll to success message
                            successMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        } else {
                            // Show error message
                            errorText.textContent = data.message || 'Something went wrong. Please try again.';
                            errorMessage.classList.remove('hidden');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        
                        // Hide loader
                        submitBtn.disabled = false;
                        submitText.textContent = 'Send Message';
                        submitLoader.classList.add('hidden');
                        
                        // Show error message
                        errorText.textContent = error.message || 'Network error. Please check your connection and try again.';
                        errorMessage.classList.remove('hidden');
                    });
                });
            }
        });
    </script>
</body>
</html> 