<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Admin Login - Grandkojo Portfolio">

    <title>Login | Grandkojo Admin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md px-4">
        <!-- Logo/Title -->
        <div class="text-center mb-8">
            <a href="{{ route('portfolio') }}" class="text-2xl font-semibold">Grandkojo</a>
            <p class="mt-2 text-[#706f6c] dark:text-[#A1A09A]">Admin Login</p>
        </div>

        <!-- Login Form -->
        <div class="bg-[#1a1a1a] dark:bg-[#0a0a0a] rounded-xl shadow-sm border border-[#3E3E3A] dark:border-[#3E3E3A] p-8">
            @if(session('error'))
                <div class="mb-4 p-4 rounded-lg bg-red-100 dark:bg-red-900/50 text-red-700 dark:text-red-200">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-[#706f6c] dark:text-[#A1A09A] mb-2">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                        class="w-full px-4 py-2.5 rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A] bg-white dark:bg-[#1a1a1a] text-[#1b1b18] dark:text-[#EDEDEC] focus:outline-none focus:ring-2 focus:ring-[#1b1b18] dark:focus:ring-[#EDEDEC] transition-colors"
                        placeholder="Enter your email">
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-[#706f6c] dark:text-[#A1A09A] mb-2">Password</label>
                    <input type="password" name="password" id="password" required
                        class="w-full px-4 py-2.5 rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A] bg-white dark:bg-[#1a1a1a] text-[#1b1b18] dark:text-[#EDEDEC] focus:outline-none focus:ring-2 focus:ring-[#1b1b18] dark:focus:ring-[#EDEDEC] transition-colors"
                        placeholder="Enter your password">
                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="h-4 w-4 rounded border-[#e3e3e0] dark:border-[#3E3E3A] text-[#1b1b18] dark:text-[#EDEDEC] focus:ring-[#1b1b18] dark:focus:ring-[#EDEDEC]">
                    <label for="remember" class="ml-2 block text-sm text-[#706f6c] dark:text-[#A1A09A]">Remember me</label>
                </div>

                <!-- Submit Button -->
                <button type="submit" 
                    class="w-full px-6 py-2.5 rounded-lg bg-[#1b1b18] dark:bg-[#EDEDEC] text-[#EDEDEC] dark:text-[#1b1b18] hover:opacity-90 transition-opacity">
                    Sign In
                </button>
            </form>
        </div>

        <!-- Back to Portfolio -->
        <div class="text-center mt-6">
            <a href="{{ route('portfolio') }}" class="text-sm text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">
                ← Back to Portfolio
            </a>
        </div>
    </div>
</body>
</html>