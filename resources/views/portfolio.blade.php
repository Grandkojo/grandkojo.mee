<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Portfolio of Ernest Kojo Owusu Essien - Software Developer">

    <title>Grandkojo | Portfolio</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC]">
    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white/80 dark:bg-[#0a0a0a]/80 backdrop-blur-sm border-b border-[#e3e3e0] dark:border-[#3E3E3A]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('portfolio') }}" class="text-xl font-semibold">Grandkojo</a>
                </div>
                
                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-4">
                    <a href="#about" class="text-sm hover:text-[#706f6c] dark:hover:text-[#A1A09A] transition-colors">About</a>
                    <a href="#resume" class="text-sm hover:text-[#706f6c] dark:hover:text-[#A1A09A] transition-colors">Resume</a>
                    <a href="#projects" class="text-sm hover:text-[#706f6c] dark:hover:text-[#A1A09A] transition-colors">Projects</a>
                    <a href="#contact" class="text-sm hover:text-[#706f6c] dark:hover:text-[#A1A09A] transition-colors">Contact</a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button type="button" id="mobile-menu-button" class="text-[#1b1b18] dark:text-[#EDEDEC] hover:text-[#706f6c] dark:hover:text-[#A1A09A] focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden fixed inset-0 z-50">
            <!-- Dark overlay -->
            <div class="absolute inset-0 bg-black/50 backdrop-blur-sm transition-opacity duration-300"></div>
            
            <!-- Menu content -->
            <div class="relative h-full w-full bg-white/95 dark:bg-[#0a0a0a]/95 backdrop-blur-sm">
                <div class="flex justify-end p-4">
                    <button type="button" id="close-menu-button" class="text-[#1b1b18] dark:text-[#EDEDEC] hover:text-[#706f6c] dark:hover:text-[#A1A09A] focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="px-4 pt-2 pb-3 space-y-1 h-screen bg-black">
                    <a href="#about" class="block px-3 py-2 text-base font-medium text-[#1b1b18] dark:text-[#EDEDEC] hover:text-[#706f6c] dark:hover:text-[#A1A09A] transition-colors">About</a>
                    <a href="#resume" class="block px-3 py-2 text-base font-medium text-[#1b1b18] dark:text-[#EDEDEC] hover:text-[#706f6c] dark:hover:text-[#A1A09A] transition-colors">Resume</a>
                    <a href="#projects" class="block px-3 py-2 text-base font-medium text-[#1b1b18] dark:text-[#EDEDEC] hover:text-[#706f6c] dark:hover:text-[#A1A09A] transition-colors">Projects</a>
                    <a href="#contact" class="block px-3 py-2 text-base font-medium text-[#1b1b18] dark:text-[#EDEDEC] hover:text-[#706f6c] dark:hover:text-[#A1A09A] transition-colors">Contact</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Add JavaScript for mobile menu -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const closeMenuButton = document.getElementById('close-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            const mobileMenuLinks = mobileMenu.querySelectorAll('a');

            function toggleMenu() {
                mobileMenu.classList.toggle('hidden');
                document.body.style.overflow = mobileMenu.classList.contains('hidden') ? '' : 'hidden';
                
                // Add transition classes
                if (!mobileMenu.classList.contains('hidden')) {
                    // Menu is opening
                    mobileMenu.style.opacity = '0';
                    requestAnimationFrame(() => {
                        mobileMenu.style.opacity = '1';
                    });
                }
            }

            mobileMenuButton.addEventListener('click', toggleMenu);
            closeMenuButton.addEventListener('click', toggleMenu);

            // Close menu when clicking a link
            mobileMenuLinks.forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.classList.add('hidden');
                    document.body.style.overflow = '';
                });
            });

            // Close menu when clicking the overlay
            mobileMenu.addEventListener('click', (e) => {
                if (e.target === mobileMenu) {
                    toggleMenu();
                }
            });
        });
    </script>

    <!-- Hero Section -->
    <section class="pt-32 pb-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center">
                <div class="mb-8 flex justify-center">
                    <div class="relative w-48 h-48 sm:w-64 sm:h-64 rounded-full overflow-hidden border-4 border-[#e3e3e0] dark:border-[#3E3E3A]">
                        <img 
                            src="{{ asset('images/profile1.jpg') }}" 
                            alt="Ernest Kojo Owusu Essien"
                            class="w-full h-full object-cover"
                            onerror="this.src='https://ui-avatars.com/api/?name=Ernest+Kojo&background=1b1b18&color=fff&size=256'"
                        >
                    </div>
                </div>
                <div class="inline-flex items-center space-x-3 mb-4">
                    <span class="text-[#706f6c] dark:text-[#A1A09A] text-lg font-medium tracking-wide">Hola, I'm</span>
                    <div class="h-px w-12 bg-[#e3e3e0] dark:bg-[#3E3E3A]"></div>
                </div>
                <h1 class="text-5xl md:text-6xl font-bold text-[#1b1b18] dark:text-[#EDEDEC] mb-6">Ernest Kojo Owusu Essien</h1>
                <p class="text-xl text-[#706f6c] dark:text-[#A1A09A] mb-8">Emerging Software Developer & Problem Solver</p>
                <div class="flex justify-center space-x-4">
                    <a href="#contact" class="px-6 py-3 bg-[#1b1b18] dark:bg-[#EDEDEC] text-white dark:text-[#1b1b18] rounded-lg hover:opacity-90 transition-opacity">Get in Touch</a>
                    <a href="#projects" class="px-6 py-3 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-lg hover:bg-[#f5f5f5] dark:hover:bg-[#1a1a1a] transition-colors">View Projects</a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-[#FDFDFC] dark:bg-[#0a0a0a]">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-12 text-[#1b1b18] dark:text-[#EDEDEC]">About Me</h2>
            <div class="max-w-3xl mx-auto">
                <div class="bg-[#1a1a1a] dark:bg-[#0a0a0a] rounded-xl shadow-sm border border-[#3E3E3A] dark:border-[#3E3E3A] p-8 mb-12">
                    <p class="text-lg text-[#706f6c] dark:text-[#A1A09A] mb-6">
                        I am Ernest Kojo Owusu Essien, a final year Computer Engineering student at Kwame Nkrumah University of Science and Technology in Ghana. I am a passionate software developer with a keen eye for creating elegant solutions to complex problems. With a strong foundation in both frontend and backend development, I strive to build applications that are not only functional but also provide an exceptional user experience.
                    </p>
                    <p class="text-lg text-[#706f6c] dark:text-[#A1A09A] mb-6">
                        My journey in software development has been driven by a constant desire to learn and adapt to new technologies. I believe in writing clean, maintainable code and following best practices to ensure the longevity and scalability of every project I work on.
                    </p>
                    <p class="text-lg text-[#706f6c] dark:text-[#A1A09A]">
                        When I'm not coding, you can find me exploring new technologies, mentoring, contributing to open-source projects, or sharing my knowledge with the developer community. I'm always excited to take on new challenges and collaborate with like-minded individuals.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Resume Section -->
    <section id="resume" class="py-20 bg-[#FDFDFC] dark:bg-[#0a0a0a]">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-12 text-[#1b1b18] dark:text-[#EDEDEC]">Resume</h2>
            <div class="max-w-4xl mx-auto">
                <!-- Experience -->
                <div class="mb-12">
                    <h3 class="text-2xl font-semibold mb-6 text-[#1b1b18] dark:text-[#EDEDEC]">Experience</h3>
                    <div class="space-y-6">
                        @foreach($resumeItems->where('type', 'experience') as $item)
                        <div class="bg-[#1a1a1a] dark:bg-[#0a0a0a] rounded-xl shadow-sm border border-[#3E3E3A] dark:border-[#3E3E3A] p-6">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <h4 class="text-lg font-medium text-[#1b1b18] dark:text-[#EDEDEC]">{{ $item->title }}</h4>
                                    <p class="text-[#706f6c] dark:text-[#A1A09A]">{{ $item->organization }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">
                                        {{ $item->start_date->format('M Y') }} - {{ $item->end_date ? $item->end_date->format('M Y') : 'Present' }}
                                    </p>
                                    @if($item->location)
                                        <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">{{ $item->location }}</p>
                                    @endif
                                </div>
                            </div>
                            @if($item->description)
                                <p class="text-[#706f6c] dark:text-[#A1A09A]">{{ $item->description }}</p>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Education -->
                <div class="mb-12">
                    <h3 class="text-2xl font-semibold mb-6 text-[#1b1b18] dark:text-[#EDEDEC]">Education</h3>
                    <div class="space-y-6">
                        @foreach($resumeItems->where('type', 'education') as $item)
                        <div class="bg-[#1a1a1a] dark:bg-[#0a0a0a] rounded-xl shadow-sm border border-[#3E3E3A] dark:border-[#3E3E3A] p-6">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <h4 class="text-lg font-medium text-[#1b1b18] dark:text-[#EDEDEC]">{{ $item->title }}</h4>
                                    <p class="text-[#706f6c] dark:text-[#A1A09A]">{{ $item->organization }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">
                                        {{ $item->start_date->format('M Y') }} - {{ $item->end_date ? $item->end_date->format('M Y') : 'Present' }}
                                    </p>
                                    @if($item->location)
                                        <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">{{ $item->location }}</p>
                                    @endif
                                </div>
                            </div>
                            @if($item->description)
                                <p class="text-[#706f6c] dark:text-[#A1A09A]">{{ $item->description }}</p>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Certifications -->
                <div>
                    <h3 class="text-2xl font-semibold mb-6 text-[#1b1b18] dark:text-[#EDEDEC]">Certifications</h3>
                    <div class="space-y-6">
                        @foreach($resumeItems->where('type', 'certification') as $item)
                        <div class="bg-[#1a1a1a] dark:bg-[#0a0a0a] rounded-xl shadow-sm border border-[#3E3E3A] dark:border-[#3E3E3A] p-6">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <h4 class="text-lg font-medium text-[#1b1b18] dark:text-[#EDEDEC]">{{ $item->title }}</h4>
                                    <p class="text-[#706f6c] dark:text-[#A1A09A]">{{ $item->organization }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">
                                        {{ $item->start_date->format('M Y') }} - {{ $item->end_date ? $item->end_date->format('M Y') : 'Present' }}
                                    </p>
                                    @if($item->location)
                                        <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">{{ $item->location }}</p>
                                    @endif
                                </div>
                            </div>
                            @if($item->description)
                                <p class="text-[#706f6c] dark:text-[#A1A09A]">{{ $item->description }}</p>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="py-20 bg-[#FDFDFC] dark:bg-[#0a0a0a]">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-12 text-[#1b1b18] dark:text-[#EDEDEC]">My Skills</h2>
            <div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4 max-w-4xl mx-auto">
                @foreach($skills as $skill)
                <div class="bg-[#1a1a1a] dark:bg-[#0a0a0a] rounded-xl shadow-sm border border-[#3E3E3A] dark:border-[#3E3E3A] p-4 flex items-center justify-center max-w-[120px] mx-auto w-full">
                    <div class="flex flex-col items-center text-center">
                        <!-- @if($skill->icon)
                            <img src="{{ asset('storage/' . $skill->icon) }}" alt="{{ $skill->name }}" class="h-12 w-12 mb-2">
                        @endif -->
                        <h3 class="text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC]">{{ $skill->name }}</h3>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-bold mb-12 text-center text-[#1b1b18] dark:text-[#EDEDEC]">Featured Projects</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($projects as $project)
                <div class="bg-white dark:bg-[#1a1a1a] rounded-lg overflow-hidden shadow-sm">
                    @if($project->featured_image)
                        <div class="aspect-video bg-[#f5f5f5] dark:bg-[#161615]">
                            <img src="{{ asset('storage/' . $project->featured_image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
                        </div>
                    @else
                        <div class="aspect-video bg-[#f5f5f5] dark:bg-[#161615]"></div>
                    @endif
                    <div class="p-6">
                        <h3 class="font-semibold mb-2 text-[#1b1b18] dark:text-[#EDEDEC]">{{ $project->title }}</h3>
                        <p class="text-sm text-[#706f6c] dark:text-[#A1A09A] mb-4">
                            {{ $project->description }}
                        </p>
                        <div class="flex flex-wrap gap-2">
                            @foreach($project->technologies as $tech)
                                <span class="px-3 py-1 text-xs bg-[#f5f5f5] dark:bg-[#161615] rounded-full text-[#706f6c] dark:text-[#A1A09A]">{{ $tech }}</span>
                            @endforeach
                        </div>
                        <div class="mt-4 flex gap-3">
                            @if($project->project_url)
                                <a href="{{ $project->project_url }}" target="_blank" class="text-sm text-[#1b1b18] dark:text-[#EDEDEC] hover:underline">View Project</a>
                            @endif
                            @if($project->github_url)
                                <a href="{{ $project->github_url }}" target="_blank" class="text-sm text-[#1b1b18] dark:text-[#EDEDEC] hover:underline">View Code</a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-16 px-4 sm:px-6 lg:px-8 bg-[#f5f5f5] dark:bg-[#161615]">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-bold mb-12 text-center">Get in Touch</h2>
            <div class="max-w-2xl mx-auto">
                <form class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium mb-2">Name</label>
                        <input type="text" id="name" name="name" class="w-full px-4 py-2 rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A] bg-white dark:bg-[#1a1a1a] focus:outline-none focus:ring-2 focus:ring-[#1b1b18] dark:focus:ring-[#EDEDEC]">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium mb-2">Email</label>
                        <input type="email" id="email" name="email" class="w-full px-4 py-2 rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A] bg-white dark:bg-[#1a1a1a] focus:outline-none focus:ring-2 focus:ring-[#1b1b18] dark:focus:ring-[#EDEDEC]">
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-medium mb-2">Message</label>
                        <textarea id="message" name="message" rows="4" class="w-full px-4 py-2 rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A] bg-white dark:bg-[#1a1a1a] focus:outline-none focus:ring-2 focus:ring-[#1b1b18] dark:focus:ring-[#EDEDEC]"></textarea>
                    </div>
                    <button type="submit" class="w-full px-6 py-3 bg-[#1b1b18] dark:bg-[#EDEDEC] text-white dark:text-[#1b1b18] rounded-lg hover:opacity-90 transition-opacity">
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-8 px-4 sm:px-6 lg:px-8 border-t border-[#e3e3e0] dark:border-[#3E3E3A]">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">© 2024 Grandkojo. All rights reserved.</p>
                </div>
                <div class="flex space-x-6">
                    <a href="https://github.com/Grandkojo" class="text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">
                        <span class="sr-only">GitHub</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="https://www.linkedin.com/in/ernest-essien-kojo" class="text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">
                        <span class="sr-only">LinkedIn</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                        </svg>
                    </a>
                    <a href="https://x.com/grandkojo" class="text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">
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
            const slide1 = document.getElementById('slide1');
            const slide2 = document.getElementById('slide2');
            let currentSlide = 1;

            function switchSlide() {
                if (currentSlide === 1) {
                    slide1.style.opacity = '0';
                    slide2.style.opacity = '1';
                    currentSlide = 2;
                } else {
                    slide1.style.opacity = '1';
                    slide2.style.opacity = '0';
                    currentSlide = 1;
                }
            }

            // Switch slides every 5 seconds
            setInterval(switchSlide, 5000);

            // Add touch swipe functionality
            let touchStartX = 0;
            let touchEndX = 0;
            
            document.getElementById('imageSlider').addEventListener('touchstart', e => {
                touchStartX = e.changedTouches[0].screenX;
            });

            document.getElementById('imageSlider').addEventListener('touchend', e => {
                touchEndX = e.changedTouches[0].screenX;
                handleSwipe();
            });

            function handleSwipe() {
                const swipeThreshold = 50;
                if (touchEndX < touchStartX - swipeThreshold) {
                    // Swipe left
                    switchSlide();
                }
                if (touchEndX > touchStartX + swipeThreshold) {
                    // Swipe right
                    switchSlide();
                }
            }
        });
    </script>
</body>
</html> 