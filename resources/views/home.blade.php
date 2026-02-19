@extends('layouts.app')

@section('content')

    <section class="relative h-screen flex items-center justify-center text-center overflow-hidden pt-24">

        {{-- Background Image --}}
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1511919884226-fd3cad34687c"
                 class="w-full h-full object-cover scale-110">
        </div>

        {{-- Dark Overlay --}}
        <div class="absolute inset-0 bg-black/85"></div>


        {{-- Content --}}
        <div class="relative z-10 max-w-4xl px-6 text-white">

            <h1 class="text-6xl md:text-7xl font-bold mb-6 tracking-tight fade-up"
                style="font-family: 'Playfair Display', serif;">
                PRECISION IN MOTIONnn
            </h1>


            <p class="text-gray-400 text-lg mb-10 tracking-wider fade-up-delay-1">
                Luxury • Performance • Prestige
            </p>

            <a href="{{ route('cars.index') }}"
               class="bg-yellow-500 text-black px-8 py-3 rounded-md font-semibold hover:bg-yellow-400 transition tracking-wider fade-up-delay-2">
                EXPLORE INVENTORY
            </a>
            {{-- Search Bar --}}
            <form action="{{ route('cars.index') }}"
                  method="GET"
                  class="mt-10 backdrop-blur bg-white/10 border border-gray-700 rounded-xl p-6 max-w-4xl mx-auto grid md:grid-cols-3 gap-4 fade-up-delay-2">

                <input type="text"
                       name="brand"
                       placeholder="Search by brand..."
                       class="bg-black/60 text-white placeholder-gray-400 px-4 py-3 rounded focus:outline-none focus:ring-2 focus:ring-yellow-500">

                <select name="max_price"
                        class="bg-black/60 text-white px-4 py-3 rounded focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    <option value="">Max Price</option>
                    <option value="10000">€10,000</option>
                    <option value="20000">€20,000</option>
                    <option value="50000">€50,000</option>
                    <option value="100000">€100,000</option>
                </select>

                <button type="submit"
                        class="bg-yellow-500 text-black font-semibold px-6 py-3 rounded hover:bg-yellow-400 transition">
                    Search
                </button>

            </form>

        </div>


    </section>
    <section class="bg-black py-24 border-t border-gray-800">

        <div class="max-w-6xl mx-auto px-6 text-center">

            <h2 class="text-3xl md:text-4xl font-playfair text-white mb-6">
                A Trusted Name in Performance & Luxury
            </h2>

            <p class="text-gray-400 max-w-2xl mx-auto mb-16">
                We specialize in curated, hand-selected vehicles that deliver
                precision engineering and uncompromising elegance.
            </p>

            <div class="grid md:grid-cols-4 gap-10 text-center">

                {{-- Stat 1 --}}
                <div x-data="{ count: 0 }"
                     x-init="
                    let target = 120;
                    let interval = setInterval(() => {
                        count++;
                        if(count >= target) clearInterval(interval);
                    }, 20);
                 "
                     class="fade-item">

                    <h3 class="text-4xl font-bold text-yellow-500">
                        <span x-text="count"></span>+
                    </h3>
                    <p class="text-gray-400 mt-2 tracking-wider uppercase text-sm">
                        Vehicles Sold
                    </p>
                </div>

                {{-- Stat 2 --}}
                <div x-data="{ count: 15 }"
                     class="fade-item">

                    <h3 class="text-4xl font-bold text-yellow-500">
                        15+
                    </h3>
                    <p class="text-gray-400 mt-2 tracking-wider uppercase text-sm">
                        Premium Brands
                    </p>
                </div>

                {{-- Stat 3 --}}
                <div x-data="{ count: 10 }"
                     class="fade-item">

                    <h3 class="text-4xl font-bold text-yellow-500">
                        10 Years
                    </h3>
                    <p class="text-gray-400 mt-2 tracking-wider uppercase text-sm">
                        Experience
                    </p>
                </div>

                {{-- Stat 4 --}}
                <div x-data="{ count: 98 }"
                     class="fade-item">

                    <h3 class="text-4xl font-bold text-yellow-500">
                        98%
                    </h3>
                    <p class="text-gray-400 mt-2 tracking-wider uppercase text-sm">
                        Client Satisfaction
                    </p>
                </div>

            </div>

        </div>

    </section>


    {{-- PREMIUM BRANDS --}}
    <section class="bg-black border-y border-gray-800 py-16">
        <div class="max-w-7xl mx-auto px-6 text-center">

            <h2 class="text-gray-500 text-sm uppercase tracking-widest mb-12">
                Trusted Premium Brands
            </h2>

            <div class="grid grid-cols-2 md:grid-cols-6 gap-10 items-center opacity-70">

                <div class="flex justify-center">
                    <img src="{{ asset('images/brands/mercedes.png') }}" class="h-14 hover:opacity-100 transition duration-300">
                </div>

                <div class="flex justify-center">
                    <img src="{{ asset('images/brands/bmw.png') }}" class="h-14 hover:opacity-100 transition duration-300">
                </div>

                <div class="flex justify-center">
                    <img src="{{ asset('images/brands/audi.png') }}" class="h-14 hover:opacity-100 transition duration-300">
                </div>

                <div class="flex justify-center">
                    <img src="{{ asset('images/brands/porsche.png') }}" class="h-14 hover:opacity-100 transition duration-300">
                </div>

                <div class="flex justify-center">
                    <img src="{{ asset('images/brands/range-rover.png') }}" class="h-14 hover:opacity-100 transition duration-300">
                </div>

                <div class="flex justify-center">
                    <img src="{{ asset('images/brands/lamborghini.png') }}" class="h-14 hover:opacity-100 transition duration-300">
                </div>

            </div>

        </div>
    </section>

    {{-- STATS SECTION --}}
    <section
        x-data="{
        started: false,
        shown: false,
        start() {
            if (!this.started) {
                this.started = true;
                this.animate('years', 12);
                this.animate('sold', 480);
                this.animate('clients', 520);
                this.animate('brands', 25);
            }
        },
        animate(ref, target) {
            let count = 0;
            let increment = target / 60;
            let interval = setInterval(() => {
                count += increment;
                if (count >= target) {
                    count = target;
                    clearInterval(interval);
                }
                this.$refs[ref].innerText = Math.floor(count);
            }, 20);
        }
    }"
        x-intersect="shown = true; start()"
        :class="shown ? 'reveal-active' : 'reveal'"
        class="bg-[#0a0a0a] py-24 text-center">


    <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-4 gap-12">

            <div>
                <div x-ref="years" class="text-4xl font-bold text-yellow-500 mb-2">0</div>
                <div class="text-gray-400 uppercase tracking-wider text-sm">
                    Years Experience
                </div>
            </div>

            <div>
                <div x-ref="sold" class="text-4xl font-bold text-yellow-500 mb-2">0</div>
                <div class="text-gray-400 uppercase tracking-wider text-sm">
                    Cars Sold
                </div>
            </div>

            <div>
                <div x-ref="clients" class="text-4xl font-bold text-yellow-500 mb-2">0</div>
                <div class="text-gray-400 uppercase tracking-wider text-sm">
                    Happy Clients
                </div>
            </div>

            <div>
                <div x-ref="brands" class="text-4xl font-bold text-yellow-500 mb-2">0</div>
                <div class="text-gray-400 uppercase tracking-wider text-sm">
                    Premium Brands
                </div>
            </div>

        </div>

    </section>
    <section class="relative h-[70vh] overflow-hidden">

        {{-- Background Video --}}
        <video autoplay muted loop playsinline
               class="absolute inset-0 w-full h-full object-cover">

            <source src="{{ asset('videos/showroom.mp4') }}" type="video/mp4">
        </video>

        {{-- Dark Overlay --}}
        <div class="absolute inset-0 bg-black/70"></div>

        {{-- Content --}}
        <div class="relative z-10 h-full flex items-center justify-center text-center px-6">

            <div class="max-w-3xl">

                <h2 class="text-4xl md:text-5xl font-playfair text-white mb-6 tracking-wide">
                    Experience the Drive Before You Own It
                </h2>

                <p class="text-gray-300 text-lg mb-8">
                    Step inside a world where performance meets elegance.
                    Every vehicle is carefully curated for drivers who demand excellence.
                </p>

                <a href="{{ route('cars.index') }}"
                   class="bg-yellow-500 text-black px-8 py-4 rounded font-semibold tracking-wider hover:bg-yellow-400 transition">
                    View Collection
                </a>

            </div>

        </div>

    </section>



    {{-- FEATURED CARS --}}
    <section
        x-data="{ shown: false }"
        x-intersect="shown = true"
        :class="shown ? 'reveal-active' : 'reveal'"
        class="bg-black py-24 overflow-hidden">

        <div class="max-w-7xl mx-auto px-6">

            <h2 class="text-3xl font-bold mb-16 text-white tracking-tight"
                style="font-family: 'Playfair Display', serif;">
                Featured Collection
            </h2>

            <div x-data
                 x-ref="slider"
                 class="relative">
                <div class="pointer-events-none absolute left-0 top-0 h-full w-20 bg-gradient-to-r from-black to-transparent z-10"></div>
                <div class="pointer-events-none absolute right-0 top-0 h-full w-20 bg-gradient-to-l from-black to-transparent z-10"></div>

                {{-- LEFT BUTTON --}}
                <button
                    @click="$refs.container.scrollBy({ left: -400, behavior: 'smooth' })"
                    class="absolute left-0 top-1/2 -translate-y-1/2 z-10 bg-black/70 backdrop-blur border border-gray-700 w-12 h-12 rounded-full text-white hover:border-yellow-500 transition">
                    <span class="text-2xl">‹</span>

                </button>

                {{-- RIGHT BUTTON --}}
                <button
                    @click="$refs.container.scrollBy({ left: 400, behavior: 'smooth' })"
                    class="absolute right-0 top-1/2 -translate-y-1/2 z-10 bg-black/70 backdrop-blur border border-gray-700 w-12 h-12 rounded-full text-white hover:border-yellow-500 transition">
                    <span class="text-2xl">›</span>

                </button>

                {{-- SCROLL AREA --}}
                <div class="flex gap-10 overflow-x-auto scrollbar-hide snap-x snap-mandatory scroll-smooth"
                     x-ref="container">


                @foreach($featuredCars as $car)
                    <a href="{{ route('cars.show', $car) }}"
                       class="min-w-[350px] snap-start group bg-[#111111] rounded-lg overflow-hidden border border-gray-800 hover:border-yellow-500 transition duration-300 hover:-translate-y-2 transform">

                        <div class="h-64 overflow-hidden">
                            @if($car->images->first())
                                <img src="{{ asset('storage/'.$car->images->first()->image) }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                            @endif
                        </div>

                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-white mb-2">
                                {{ $car->title }}
                            </h3>

                            <p class="text-gray-400 text-sm mb-3">
                                {{ $car->year }} • {{ ucfirst($car->fuel_type) }}
                            </p>

                            <div class="mt-4 text-sm tracking-widest text-gray-500 uppercase">
                                View Details →
                            </div>

                        </div>
                    </a>
                @endforeach

            </div>
            </div>

        </div>

    </section>
    {{-- WHY CHOOSE DRIVEONE --}}
    <section class="bg-neutral-950 py-24 border-t border-neutral-800">
        <div class="max-w-7xl mx-auto px-6 text-center">

            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6 tracking-wide"
                style="font-family: 'Playfair Display', serif;">
                Why Choose DriveOne
            </h2>

            <p class="text-neutral-400 max-w-2xl mx-auto mb-16">
                We curate vehicles that deliver more than performance — they deliver presence.
            </p>

            <div class="grid md:grid-cols-3 gap-12">

                {{-- Card 1 --}}
                <div class="group relative p-10 rounded-2xl
    bg-gradient-to-b from-white/[0.04] to-white/[0.02]
    border border-white/10
    transition-all duration-700 ease-out
    hover:-translate-y-2
    hover:border-yellow-500/50
    hover:shadow-[0_0_40px_rgba(234,179,8,0.15)]
">

                    <div class="mb-8 flex justify-center
    text-yellow-400 opacity-80
    transition-all duration-700
    group-hover:opacity-100
    group-hover:scale-110
    group-hover:text-yellow-500">
                        <svg class="w-10 h-10 text-yellow-400 opacity-80" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3 13l1-4a2 2 0 012-1h12a2 2 0 012 1l1 4M5 13v4m14-4v4M7 17h10" />
                        </svg>
                    </div>

                    <h3 class="text-xl tracking-wide mb-4 text-white
    transition-all duration-500
    group-hover:text-yellow-400">
                        Hand-Selected Vehicles
                    </h3>

                    <p class="text-neutral-400 text-sm leading-relaxed">
                        Every car is carefully inspected and chosen for quality, performance, and prestige.
                    </p>

                </div>

                {{-- Card 2 --}}
                <div class="group relative p-10 rounded-2xl
    bg-gradient-to-b from-white/[0.04] to-white/[0.02]
    border border-white/10
    transition-all duration-700 ease-out
    hover:-translate-y-2
    hover:border-yellow-500/50
    hover:shadow-[0_0_40px_rgba(234,179,8,0.15)]
">
                    <div class="mb-8 flex justify-center
    text-yellow-400 opacity-80
    transition-all duration-700
    group-hover:opacity-100
    group-hover:scale-110
    group-hover:text-yellow-500">                        <svg class="w-10 h-10 text-yellow-400 opacity-80" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 3l8 4v5c0 5-3.5 8-8 9-4.5-1-8-4-8-9V7l8-4z" />
                        </svg>
                    </div>

                    <h3 class="text-xl tracking-wide mb-4 text-white
    transition-all duration-500
    group-hover:text-yellow-400">
                        Certified & Inspected
                    </h3>

                    <p class="text-neutral-400 text-sm leading-relaxed">
                        Comprehensive multi-point inspections ensure reliability and confidence in every purchase.
                    </p>

                </div>

                {{-- Card 3 --}}
                <div class="group relative p-10 rounded-2xl
    bg-gradient-to-b from-white/[0.04] to-white/[0.02]
    border border-white/10
    transition-all duration-700 ease-out
    hover:-translate-y-2
    hover:border-yellow-500/50
    hover:shadow-[0_0_40px_rgba(234,179,8,0.15)]
">
                    <div class="mb-8 flex justify-center
    text-yellow-400 opacity-80
    transition-all duration-700
    group-hover:opacity-100
    group-hover:scale-110
    group-hover:text-yellow-500">
                        <svg class="w-10 h-10 text-yellow-400 opacity-80" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 17l-5 3 1.5-6L4 9l6-.5L12 3l2 5.5L20 9l-4.5 5 1.5 6z" />
                        </svg>
                    </div>

                    <h3 class="text-xl tracking-wide mb-4 text-white
    transition-all duration-500
    group-hover:text-yellow-400">
                        Premium Client Experience
                    </h3>

                    <p class="text-neutral-400 text-sm leading-relaxed">
                        A seamless buying process designed around discretion, comfort, and excellence.
                    </p>

                </div>

            </div>

        </div>
    </section>
    {{-- CINEMATIC DIVIDER --}}
    <section class="relative h-[70vh] flex items-center justify-center text-center overflow-hidden">

        {{-- Background Image --}}
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70"
                 class="w-full h-full object-cover scale-110 transition-transform duration-[10000ms] hover:scale-125">
        </div>

        {{-- Dark Overlay --}}
        <div class="absolute inset-0 bg-black/75"></div>

        {{-- Content --}}
        <div class="relative z-10 max-w-3xl px-6">

            <h2 class="text-4xl md:text-5xl font-bold text-white leading-tight mb-6 tracking-wide"
                style="font-family: 'Playfair Display', serif;">
                We Don’t Sell Cars.
            </h2>

            <h3 class="text-3xl md:text-4xl font-semibold text-yellow-500 tracking-wider">
                We Deliver Presence.
            </h3>

        </div>

    </section>


    {{-- TESTIMONIALS --}}
    <section class="bg-black py-24 border-t border-neutral-800">
        <div class="max-w-6xl mx-auto px-6 text-center">

            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6 tracking-wide"
                style="font-family: 'Playfair Display', serif;">
                Client Experiences
            </h2>

            <p class="text-neutral-400 max-w-2xl mx-auto mb-16">
                Our clients expect excellence. We deliver it.
            </p>

            <div class="grid md:grid-cols-3 gap-12">

                {{-- Testimonial 1 --}}
                <div class="bg-neutral-900 p-10 rounded-xl border border-neutral-800 hover:border-yellow-500 transition-all duration-300">

                    <div class="text-yellow-500 text-xl mb-4">★★★★★</div>

                    <p class="text-neutral-300 text-sm leading-relaxed mb-6">
                        “The entire experience felt premium from start to finish. Professional, transparent, and flawless.”
                    </p>

                    <div class="text-white font-semibold tracking-wide">
                        James M.
                    </div>

                    <div class="text-neutral-500 text-xs uppercase tracking-wider mt-1">
                        Porsche 911 Owner
                    </div>

                </div>

                {{-- Testimonial 2 --}}
                <div class="bg-neutral-900 p-10 rounded-xl border border-neutral-800 hover:border-yellow-500 transition-all duration-300">

                    <div class="text-yellow-500 text-xl mb-4">★★★★★</div>

                    <p class="text-neutral-300 text-sm leading-relaxed mb-6">
                        “DriveOne exceeded my expectations. The attention to detail and service level is unmatched.”
                    </p>

                    <div class="text-white font-semibold tracking-wide">
                        Elena R.
                    </div>

                    <div class="text-neutral-500 text-xs uppercase tracking-wider mt-1">
                        BMW M5 Owner
                    </div>

                </div>

                {{-- Testimonial 3 --}}
                <div class="bg-neutral-900 p-10 rounded-xl border border-neutral-800 hover:border-yellow-500 transition-all duration-300">

                    <div class="text-yellow-500 text-xl mb-4">★★★★★</div>

                    <p class="text-neutral-300 text-sm leading-relaxed mb-6">
                        “A seamless buying process and exceptional vehicle quality. I wouldn’t go anywhere else.”
                    </p>

                    <div class="text-white font-semibold tracking-wide">
                        Daniel K.
                    </div>

                    <div class="text-neutral-500 text-xs uppercase tracking-wider mt-1">
                        Mercedes AMG Owner
                    </div>

                </div>

            </div>

        </div>
    </section>

@endsection
