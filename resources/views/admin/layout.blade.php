<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DriveOne Admin</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-black text-white">

<div x-data="{ sidebarOpen: false }" class="flex min-h-screen">

    {{-- MOBILE OVERLAY --}}
    <div
        x-show="sidebarOpen"
        @click="sidebarOpen = false"
        class="fixed inset-0 bg-black/60 z-40 lg:hidden"
        x-transition.opacity>
    </div>


    {{-- SIDEBAR --}}
    <aside
        class="fixed lg:static inset-y-0 left-0 w-64 bg-black border-r border-neutral-800 z-50 transform transition-transform duration-300"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
    >

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

            <a href="{{ route('admin.users.index') }}"
               class="block px-4 py-2 hover:bg-neutral-800 rounded">
                Users
            </a>

            <a href="#"
               class="block px-4 py-2 hover:bg-neutral-800 rounded">
                Contacts
            </a>

        </nav>

    </aside>


    {{-- MAIN CONTENT --}}
    <div class="flex-1 flex flex-col">

        {{-- TOPBAR --}}
        <header class="border-b border-neutral-800 p-4 flex justify-between items-center">

            {{-- MOBILE MENU BUTTON --}}
            <button
                @click="sidebarOpen = true"
                class="lg:hidden text-white text-2xl"
            >
                ☰
            </button>

            <div class="flex items-center gap-4 ml-auto">

                <span class="text-neutral-400">
                    {{ auth()->user()->name }}
                </span>

                {{-- LOGOUT --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="text-red-400 hover:text-red-300">
                        Logout
                    </button>
                </form>

            </div>

        </header>


        {{-- PAGE CONTENT --}}
        <main class="p-4 md:p-8">

            @yield('content')

        </main>

    </div>

</div>

</body>
</html>
