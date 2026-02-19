<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DriveOne Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css','resources/js/app.js'])
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

</head>

<body class="bg-neutral-950 text-white font-sans">

<div class="flex min-h-screen">

    {{-- SIDEBAR --}}
    <aside
        x-data="{ open: true }"
        :class="open ? 'w-64' : 'w-20'"
        class="fixed left-0 top-0 h-screen bg-black border-r border-neutral-800 flex flex-col transition-all duration-300 z-50">

        {{-- Logo --}}
        <div class="h-20 flex items-center justify-between px-6 border-b border-neutral-800">

            <div x-show="open" class="leading-tight">
                <div class="text-white text-xl tracking-[0.3em] font-light">
                    DRIVE<span class="text-yellow-500 font-medium">ONE</span>
                </div>
                <div class="text-neutral-500 text-xs uppercase tracking-widest">
                    Admin Panel
                </div>
            </div>

            {{-- Toggle button --}}
            <button
                @click="open = !open"
                class="text-neutral-400 hover:text-yellow-500 transition">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-6 h-6"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>

            </button>

        </div>

        {{-- Menu --}}
        <nav class="flex-1 px-3 py-6 space-y-2">

            @php
                function active($route) {
                    return request()->routeIs($route)
                        ? 'bg-yellow-500/10 text-yellow-500 border-l-2 border-yellow-500'
                        : 'text-neutral-400 hover:text-white hover:bg-neutral-900';
                }
            @endphp

            {{-- Dashboard --}}
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-4 px-4 py-3 rounded transition {{ active('admin.dashboard') }}">

                <span class="text-lg">📊</span>

                <span x-show="open">Dashboard</span>

            </a>

            {{-- Cars --}}
            <a href="{{ route('admin.cars.index') }}"
               class="flex items-center gap-4 px-4 py-3 rounded transition {{ active('admin.cars.*') }}">

                <span class="text-lg">🚗</span>

                <span x-show="open">Cars</span>

            </a>

            {{-- Test Drives --}}
            <a href="#"
               class="flex items-center gap-4 px-4 py-3 rounded transition {{ active('admin.testdrives.*') }}">

                <span class="text-lg">📅</span>

                <span x-show="open">Test Drives</span>

            </a>

            {{-- Contacts --}}
            <a href="#"
               class="flex items-center gap-4 px-4 py-3 rounded transition {{ active('admin.contacts.*') }}">

                <span class="text-lg">✉</span>

                <span x-show="open">Contacts</span>

            </a>

        </nav>

        {{-- Footer --}}
        <div class="p-4 border-t border-neutral-800 text-xs text-neutral-500 text-center">
        <span x-show="open">
            © {{ date('Y') }} DriveOne
        </span>
        </div>

    </aside>


    {{-- MAIN --}}
    <main class="flex-1">

        {{-- TOP BAR --}}
        <header class="bg-black border-b border-neutral-800 px-8 py-4 flex justify-between">

            <h2 class="text-lg">
                @yield('title')
            </h2>

            <div class="text-sm text-neutral-400">
                {{ auth()->user()->name ?? 'Admin' }}
            </div>

        </header>


        {{-- CONTENT --}}
        <div class="ml-64 p-8 transition-all duration-300">
            @yield('content')
        </div>


    </main>

</div>

</body>
</html>
