@extends('layouts.app')

@section('title', 'Services | Grandkojo')
@section('meta_description', 'Services by Ernest Kojo Owusu Essien - AI Automation & Custom Development')

@php
    $activeNav = 'services';
@endphp

@section('content')
    <!-- Services Section -->
    <section class="pt-32 md:pt-36 pb-16 px-4 sm:px-6 lg:px-8 relative">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-16 fade-in">
                <h1 class="text-5xl md:text-6xl font-bold mb-6 bg-gradient-to-r from-cyan-400 via-purple-400 to-teal-400 bg-clip-text text-transparent fade-in-up">Services</h1>
                <p class="text-xl text-[#706f6c] dark:text-[#A1A09A] max-w-2xl mx-auto fade-in-up">
                    Transforming businesses with AI automation and custom development solutions
                </p>
            </div>

            <!-- Services Grid -->
            <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                <!-- AI Automation Service -->
                <div class="backdrop-blur-md bg-white/5 dark:bg-white/5 rounded-2xl overflow-hidden border border-white/10 dark:border-white/10 shadow-xl hover:shadow-2xl hover:shadow-cyan-500/20 transition-all duration-300 transform hover:scale-100 hover:-translate-y-2 fade-in-up" style="animation-delay: 0.1s">
                    <div class="p-8">
                        <div class="mb-6">
                            <div class="w-16 h-16 rounded-xl backdrop-blur-sm bg-gradient-to-br from-cyan-500/20 to-purple-500/20 border border-cyan-500/30 flex items-center justify-center mb-4">
                                <svg class="w-8 h-8 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                </svg>
                            </div>
                            <h2 class="text-2xl font-semibold mb-3 text-[#1b1b18] dark:text-[#EDEDEC]">AI Automation for SMEs</h2>
                            <p class="text-[#706f6c] dark:text-[#A1A09A] leading-relaxed mb-6">
                                Streamline your business operations with intelligent automation solutions tailored for small and medium enterprises. I specialize in creating AI-powered systems that reduce manual work, improve efficiency, and drive growth.
                            </p>
                        </div>
                        
                        <div class="space-y-4 mb-6">
                            <h3 class="text-lg font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-3">Industries I Serve:</h3>
                            
                            <!-- Health Sector -->
                            <div class="backdrop-blur-sm bg-white/5 dark:bg-white/5 rounded-xl p-4 border border-white/10 dark:border-white/10">
                                <div class="flex items-start gap-3">
                                    <div class="w-10 h-10 rounded-lg bg-teal-500/20 flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-teal-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-[#1b1b18] dark:text-[#EDEDEC] mb-1">Healthcare</h4>
                                        <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">Patient management systems, appointment scheduling, medical record automation, and diagnostic assistance tools.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Legal Sector -->
                            <div class="backdrop-blur-sm bg-white/5 dark:bg-white/5 rounded-xl p-4 border border-white/10 dark:border-white/10">
                                <div class="flex items-start gap-3">
                                    <div class="w-10 h-10 rounded-lg bg-purple-500/20 flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-[#1b1b18] dark:text-[#EDEDEC] mb-1">Legal</h4>
                                        <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">Document automation, case management systems, contract analysis, and client communication workflows.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Real Estate Sector -->
                            <div class="backdrop-blur-sm bg-white/5 dark:bg-white/5 rounded-xl p-4 border border-white/10 dark:border-white/10">
                                <div class="flex items-start gap-3">
                                    <div class="w-10 h-10 rounded-lg bg-cyan-500/20 flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-[#1b1b18] dark:text-[#EDEDEC] mb-1">Real Estate</h4>
                                        <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">Property management automation, lead generation systems, virtual tour integrations, and CRM solutions.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pt-4 border-t border-white/10 dark:border-white/10">
                            <a href="{{ route('portfolio') }}#contact" class="inline-flex items-center text-cyan-400 hover:text-cyan-300 transition-colors font-medium group">
                                <span>Get Started</span>
                                <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Custom Development Service -->
                <div class="backdrop-blur-md bg-white/5 dark:bg-white/5 rounded-2xl overflow-hidden border border-white/10 dark:border-white/10 shadow-xl hover:shadow-2xl hover:shadow-purple-500/20 transition-all duration-300 transform hover:scale-100 hover:-translate-y-2 fade-in-up" style="animation-delay: 0.2s">
                    <div class="p-8">
                        <div class="mb-6">
                            <div class="w-16 h-16 rounded-xl backdrop-blur-sm bg-gradient-to-br from-purple-500/20 to-teal-500/20 border border-purple-500/30 flex items-center justify-center mb-4">
                                <svg class="w-8 h-8 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                                </svg>
                            </div>
                            <h2 class="text-2xl font-semibold mb-3 text-[#1b1b18] dark:text-[#EDEDEC]">Custom Website & App Development</h2>
                            <p class="text-[#706f6c] dark:text-[#A1A09A] leading-relaxed mb-6">
                                Build powerful, scalable web applications and mobile apps tailored to your business needs. From concept to deployment, I deliver modern solutions that drive results.
                            </p>
                        </div>
                        
                        <div class="space-y-4 mb-6">
                            <h3 class="text-lg font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-3">What I Build:</h3>
                            
                            <!-- Web Development -->
                            <div class="backdrop-blur-sm bg-white/5 dark:bg-white/5 rounded-xl p-4 border border-white/10 dark:border-white/10">
                                <div class="flex items-start gap-3">
                                    <div class="w-10 h-10 rounded-lg bg-cyan-500/20 flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-[#1b1b18] dark:text-[#EDEDEC] mb-1">Web Applications</h4>
                                        <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">Full-stack web apps with Laravel, Django, React, Vue.js, and modern frameworks. Responsive, fast, and user-friendly.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- E-commerce -->
                            <div class="backdrop-blur-sm bg-white/5 dark:bg-white/5 rounded-xl p-4 border border-white/10 dark:border-white/10">
                                <div class="flex items-start gap-3">
                                    <div class="w-10 h-10 rounded-lg bg-teal-500/20 flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-teal-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-[#1b1b18] dark:text-[#EDEDEC] mb-1">E-commerce Platforms</h4>
                                        <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">Complete online stores with payment integration, inventory management, and admin dashboards.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pt-4 border-t border-white/10 dark:border-white/10">
                            <a href="{{ route('portfolio') }}#contact" class="inline-flex items-center text-purple-400 hover:text-purple-300 transition-colors font-medium group">
                                <span>Get Started</span>
                                <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="mt-16 text-center fade-in-up" style="animation-delay: 0.3s">
                <div class="backdrop-blur-md bg-gradient-to-r from-cyan-500/10 via-purple-500/10 to-teal-500/10 rounded-2xl p-8 border border-white/10 dark:border-white/10 shadow-xl">
                    <h2 class="text-3xl font-bold mb-4 text-[#1b1b18] dark:text-[#EDEDEC]">Ready to Transform Your Business?</h2>
                    <p class="text-lg text-[#706f6c] dark:text-[#A1A09A] mb-6 max-w-2xl mx-auto">
                        Let's discuss how I can help automate your processes or build a custom solution that drives growth. Get in touch today.
                    </p>
                    <a href="{{ route('portfolio') }}#contact" class="inline-flex items-center px-8 py-4 backdrop-blur-md bg-gradient-to-r from-cyan-500 to-purple-500 text-white rounded-lg hover:shadow-lg hover:shadow-cyan-500/50 transition-all transform hover:scale-100 font-medium">
                        <span>Contact Me</span>
                        <svg class="w-5 h-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
