<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DriveOne Admin</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-black text-white">

<div class="flex min-h-screen">

    {{-- SIDEBAR --}}
    <aside class="w-64 bg-black border-r border-neutral-800 flex-shrink-0">

        <div class="p-6 text-xl font-bold border-b border-neutral-800">
            DRIVE<span class="text-yellow-500">ONE</span>
            <div class="text-sm text-neutral-400">Admin Panel</div>
        </div>

        <nav class="p-4 space-y-2">

            <a href="{{ route('admin.dashboard') }}"
               class="block px-4 py-2 hover:bg-neutral-800 rounded">
                Dashboard
            </a>

            <a href="{{ route('admin.cars.index') }}"
               class="block px-4 py-2 hover:bg-neutral-800 rounded">
                Cars
            </a>

            <a href="{{ route('admin.testdrives.index') }}"
               class="block px-4 py-2 hover:bg-neutral-800 rounded">
                Test Drives
            </a>

            <a href="#"
               class="block px-4 py-2 hover:bg-neutral-800 rounded">
                Contacts
            </a>

        </nav>

    </aside>


    {{-- MAIN CONTENT --}}
    <main class="flex-1">

        {{-- TOP BAR --}}
        <header class="border-b border-neutral-800 p-4 flex justify-end">
            {{ auth()->user()->name }}
        </header>


        {{-- PAGE CONTENT --}}
        <div class="p-8">

            @yield('content')

        </div>

    </main>

</div>

</body>
</html>
