<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Admin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

     <!-- Favicon -->
     <link rel="icon" type="image/png" href="{{ asset('favicon/favicon-96x96.png') }}" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon/favicon.svg') }}" />
    <link rel="shortcut icon" href="{{ asset('favicon/favicon.ico') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}" />
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}" />
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Additional Styles -->
    @stack('styles')
</head>
<body class="font-sans antialiased bg-black text-white">
    <div class="min-h-screen">
        <!-- Navigation -->
        <nav class="bg-black/80 backdrop-blur-sm border-b border-[#3E3E3A]">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold text-white">
                                Admin Panel
                            </a>
                        </div>

                        <!-- Desktop Navigation Links -->
                        <div class="hidden md:flex space-x-8 ml-10">
                            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-[#A1A09A] hover:text-white hover:border-[#3E3E3A] focus:outline-none focus:text-white focus:border-[#3E3E3A] transition duration-150 ease-in-out">
                                Dashboard
                            </a>
                            <a href="{{ route('admin.projects.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-[#A1A09A] hover:text-white hover:border-[#3E3E3A] focus:outline-none focus:text-white focus:border-[#3E3E3A] transition duration-150 ease-in-out">
                                Projects
                            </a>
                            <a href="{{ route('admin.skills.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-[#A1A09A] hover:text-white hover:border-[#3E3E3A] focus:outline-none focus:text-white focus:border-[#3E3E3A] transition duration-150 ease-in-out">
                                Skills
                            </a>
                            <a href="{{ route('admin.resume.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-[#A1A09A] hover:text-white hover:border-[#3E3E3A] focus:outline-none focus:text-white focus:border-[#3E3E3A] transition duration-150 ease-in-out">
                                Resume
                            </a>
                            {{-- <a href="{{ route('admin.blogs.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-[#A1A09A] hover:text-white hover:border-[#3E3E3A] focus:outline-none focus:text-white focus:border-[#3E3E3A] transition duration-150 ease-in-out">Blog</a> --}}
                        </div>
                    </div>

                    <!-- Desktop Settings Dropdown -->
                    <div class="hidden md:flex md:items-center md:ml-6">
                        <div class="ml-3 relative">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="text-sm text-[#A1A09A] hover:text-white transition-colors">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Mobile Menu Button -->
                    <div class="md:hidden flex items-center">
                        <button type="button" id="mobile-menu-button" class="text-white hover:text-[#A1A09A] focus:outline-none">
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
                <div class="relative h-full w-full bg-black/95 backdrop-blur-sm">
                    <div class="flex justify-between items-center p-4 border-b border-[#3E3E3A]">
                        <span class="text-xl font-bold text-white">Admin Panel</span>
                        <button type="button" id="close-menu-button" class="text-white hover:text-[#A1A09A] focus:outline-none">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="px-4 pt-2 pb-3 space-y-1 h-screen bg-black">
                        <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 text-base font-medium text-white hover:text-[#A1A09A] transition-colors">Dashboard</a>
                        <a href="{{ route('admin.projects.index') }}" class="block px-3 py-2 text-base font-medium text-white hover:text-[#A1A09A] transition-colors">Projects</a>
                        <a href="{{ route('admin.skills.index') }}" class="block px-3 py-2 text-base font-medium text-white hover:text-[#A1A09A] transition-colors">Skills</a>
                        <a href="{{ route('admin.resume.index') }}" class="block px-3 py-2 text-base font-medium text-white hover:text-[#A1A09A] transition-colors">Resume</a>
                        {{-- <a href="{{ route('admin.blogs.index') }}" class="block px-3 py-2 text-base font-medium text-white hover:text-[#A1A09A] transition-colors">Blog</a> --}}
                        <div class="border-t border-[#3E3E3A] mt-4 pt-4">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-3 py-2 text-base font-medium text-white hover:text-[#A1A09A] transition-colors">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main>
            @if (session('success'))
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                    <div class="bg-green-900 border border-green-700 text-green-200 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                    <div class="bg-red-900 border border-red-700 text-red-200 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
    
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
    
    <!-- Additional Scripts -->
    @stack('scripts')
</body>
</html> 