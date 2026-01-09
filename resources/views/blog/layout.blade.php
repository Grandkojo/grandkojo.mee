<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('meta_description', 'Blog posts by Ernest Kojo Owusu Essien - Software Developer')">

    <title>@yield('title', 'Blog') | Grandkojo</title>

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

    <!-- Prism.js for code highlighting -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-core.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>

    @stack('styles')
    @stack('meta')
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
                    <a href="{{ route('portfolio') }}" class="text-sm hover:text-[#706f6c] dark:hover:text-[#A1A09A] transition-colors">Portfolio</a>
                    <a href="{{ route('blog.index') }}" class="text-sm hover:text-[#706f6c] dark:hover:text-[#A1A09A] transition-colors">Blog</a>
                    <a href="{{ route('portfolio') }}#about" class="text-sm hover:text-[#706f6c] dark:hover:text-[#A1A09A] transition-colors">About</a>
                    <a href="{{ route('portfolio') }}#contact" class="text-sm hover:text-[#706f6c] dark:hover:text-[#A1A09A] transition-colors">Contact</a>
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
                    <a href="{{ route('portfolio') }}" class="block px-3 py-2 text-base font-medium text-[#1b1b18] dark:text-[#EDEDEC] hover:text-[#706f6c] dark:hover:text-[#A1A09A] transition-colors">Portfolio</a>
                    <a href="{{ route('blog.index') }}" class="block px-3 py-2 text-base font-medium text-[#1b1b18] dark:text-[#EDEDEC] hover:text-[#706f6c] dark:hover:text-[#A1A09A] transition-colors">Blog</a>
                    <a href="{{ route('portfolio') }}#about" class="block px-3 py-2 text-base font-medium text-[#1b1b18] dark:text-[#EDEDEC] hover:text-[#706f6c] dark:hover:text-[#A1A09A] transition-colors">About</a>
                    <a href="{{ route('portfolio') }}#contact" class="block px-3 py-2 text-base font-medium text-[#1b1b18] dark:text-[#EDEDEC] hover:text-[#706f6c] dark:hover:text-[#A1A09A] transition-colors">Contact</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-16">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-[#1a1a1a] dark:bg-[#0a0a0a] border-t border-[#3E3E3A] dark:border-[#3E3E3A] py-8 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <p class="text-[#706f6c] dark:text-[#A1A09A]">&copy; {{ date('Y') }} Grandkojo. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Mobile Menu JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const closeMenuButton = document.getElementById('close-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            const mobileMenuLinks = mobileMenu.querySelectorAll('a');

            function toggleMenu() {
                mobileMenu.classList.toggle('hidden');
                document.body.style.overflow = mobileMenu.classList.contains('hidden') ? '' : 'hidden';
                
                if (!mobileMenu.classList.contains('hidden')) {
                    mobileMenu.style.opacity = '0';
                    requestAnimationFrame(() => {
                        mobileMenu.style.opacity = '1';
                    });
                }
            }

            mobileMenuButton.addEventListener('click', toggleMenu);
            closeMenuButton.addEventListener('click', toggleMenu);
            mobileMenuLinks.forEach(link => {
                link.addEventListener('click', toggleMenu);
            });
        });
    </script>

    @stack('scripts')
</body>
</html> 