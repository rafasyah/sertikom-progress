<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 dark:bg-gray-900" x-data="{ sidebarOpen: false }" @close-sidebar.window="sidebarOpen = false">
    <div class="flex min-h-screen">
        <!-- DESKTOP SIDEBAR -->
        <aside class="w-64 bg-slate-800 text-white hidden lg:block">
            @include('layouts.navigation')
        </aside>

        <!-- MOBILE SIDEBAR -->
        <aside class="fixed inset-y-0 left-0 z-30 w-64 bg-slate-800 text-white transform -translate-x-full lg:hidden"
               :class="{ 'translate-x-0': sidebarOpen }"
               x-transition>
            @include('layouts.navigation')
        </aside>

        <!-- SIDEBAR OVERLAY -->
        <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 z-20 bg-black bg-opacity-50 lg:hidden" x-transition></div>

        <!-- MAIN CONTENT -->
        <div class="flex-1 flex flex-col">
        <!-- MOBILE HEADER -->
        <div class="lg:hidden bg-white dark:bg-gray-800 shadow border-b border-gray-200 dark:border-gray-700 px-4 py-3 flex items-center justify-between">
            <button @click="sidebarOpen = !sidebarOpen" class="p-2 rounded-md text-gray-500 hover:text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-gray-200 dark:hover:bg-gray-700 transition-colors duration-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
            <h1 class="text-lg font-semibold text-gray-900 dark:text-gray-100">SMK Kesatuan Mandiri</h1>
            <div class="w-10"></div> <!-- Spacer for centering -->
        </div>

        <!-- PAGE HEADER -->
        @if(!empty(trim($header ?? '')))
            <header class="bg-white dark:bg-gray-800 shadow border-b border-gray-200 dark:border-gray-700">
                <div class="py-4 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- PAGE CONTENT -->
        <main class="flex-1 p-4">
            {{ $slot }}
        </main>
    </div>
</body>
</html>
