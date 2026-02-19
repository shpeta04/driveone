<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DriveOne Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css','resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

</head>

<body class="bg-neutral-950 text-white font-sans">

<div class="flex min-h-screen">

    {{-- SIDEBAR --}}
    <aside class="w-64 bg-black border-r border-neutral-800">

        <div class="p-6 border-b border-neutral-800">
            <h1 class="text-xl font-semibold tracking-widest">
                DRIVE<span class="text-yellow-500">ONE</span>
            </h1>
            <p class="text-xs text-neutral-500 mt-1">Admin Panel</p>
        </div>

        <nav class="p-4 space-y-2">

            <a href="{{ route('admin.dashboard') }}"
               class="block px-4 py-3 rounded-lg hover:bg-neutral-800 transition">
                Dashboard
            </a>

            <a href="{{ route('admin.cars.index') }}"
               class="block px-4 py-3 rounded-lg hover:bg-neutral-800 transition">
                Cars
            </a>

            <a href="#"
               class="block px-4 py-3 rounded-lg hover:bg-neutral-800 transition">
                Test Drives
            </a>

            <a href="#"
               class="block px-4 py-3 rounded-lg hover:bg-neutral-800 transition">
                Contacts
            </a>

        </nav>

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
        <div class="p-8">
            @yield('content')
        </div>

    </main>

</div>

</body>
</html>
