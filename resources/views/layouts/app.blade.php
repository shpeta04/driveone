<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DriveOne</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">


    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-black text-gray-200 font-sans">
<div
    x-data="{ loading: true }"
    x-init="
        setTimeout(() => {
            loading = false
            document.body.classList.remove('overflow-hidden')
        }, 1200)
    "
    x-show="loading"
    x-transition.opacity.duration.700ms
    class="fixed inset-0 bg-black flex items-center justify-center z-[99999]"
>

    <div class="text-center">

        <div class="text-3xl tracking-widest text-white mb-6"
             style="font-family: 'Playfair Display', serif;">
            DRIVE<span class="text-yellow-500">ONE1</span>
        </div>

        <div class="w-40 h-[2px] bg-white/10 relative overflow-hidden mx-auto">
            <div class="absolute inset-0 bg-yellow-500 animate-loader"></div>
        </div>

    </div>

</div>

<div
    x-data="{ progress: 0 }"
    x-init="
        window.addEventListener('scroll', () => {
            let scrollTop = window.scrollY;
            let docHeight = document.body.scrollHeight - window.innerHeight;
            progress = (scrollTop / docHeight) * 100;
        })
    "
    class="fixed top-0 left-0 w-full h-[3px] z-[9999]">

    <div
        :style="`width: ${progress}%`"
        class="h-full bg-yellow-500 transition-all duration-150">
    </div>

</div>


{{-- NAVBAR --}}
<nav
    x-data="{ open:false, scrolled:false }"
    x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 50)"
    :class="scrolled
        ? 'bg-black shadow-lg border-b border-gray-800'
        : 'bg-transparent'"
    class="fixed top-0 left-0 w-full z-50 transition-all duration-500">

    <div class="max-w-7xl mx-auto px-6 py-5">

        <div class="flex items-center justify-between">

            {{-- LOGO --}}
            <a href="{{ route('home') }}"
               class="text-2xl font-bold tracking-wide text-white">
                DRIVE<span class="text-yellow-500">ONE</span>
            </a>

            {{-- DESKTOP MENU --}}
            <div class="hidden md:flex space-x-8 text-sm uppercase tracking-wider text-white">

                <a href="{{ route('home') }}"
                   class="hover:text-yellow-500 transition">
                    Home
                </a>

                <a href="{{ route('cars.index') }}"
                   class="hover:text-yellow-500 transition">
                    Inventory
                </a>

                <a href="{{ route('contact') }}"
                   class="hover:text-yellow-500 transition">
                    Contact
                </a>

            </div>

            {{-- MOBILE BUTTON --}}
            <button
                @click="open = !open"
                class="md:hidden text-white focus:outline-none">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-7 h-7"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16" />

                </svg>

            </button>

        </div>

        {{-- MOBILE MENU --}}
        <div
            x-show="open"
            x-transition
            @click.away="open = false"
            class="md:hidden mt-6 space-y-4 text-center text-white uppercase tracking-wider">

            <a href="{{ route('home') }}"
               class="block hover:text-yellow-500 transition">
                Home
            </a>

            <a href="{{ route('cars.index') }}"
               class="block hover:text-yellow-500 transition">
                Inventory
            </a>

            <a href="{{ route('contact') }}"
               class="block hover:text-yellow-500 transition">
                Contact
            </a>

        </div>

    </div>

</nav>


<main
    x-data="{ show: false }"
    x-init="
        setTimeout(() => show = true, 50);
        window.addEventListener('page-leave', () => show = false);
    "
    x-show="show"
    x-transition.opacity.duration.400ms
    class="min-h-screen">


    @yield('content')

</main>


{{-- FOOTER --}}
<footer class="border-t border-gray-800 mt-20">
    <div class="max-w-7xl mx-auto px-6 py-10 text-center text-gray-500 text-sm">
        © {{ date('Y') }} DriveOne. Premium Automotive Experience.
    </div>
</footer>
<style>
    .fade-item {
        opacity: 0;
        transform: translateY(40px);
        transition: opacity 0.8s ease, transform 0.8s ease;
    }

    .fade-item.show {
        opacity: 1;
        transform: translateY(0);
    }
</style>

<a href="/contact"
   class="fixed bottom-8 right-8 bg-neutral-900 border border-yellow-500 text-yellow-500 px-6 py-4 rounded-full shadow-lg hover:bg-yellow-500 hover:text-black transition-all duration-300 z-50 tracking-widest font-medium">

    CONTACT

</a>



</body>
</html>
