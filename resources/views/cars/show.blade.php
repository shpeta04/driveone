@extends('layouts.app')

@section('content')

    <section
        x-data="{ openTestDrive: false }"
        class="bg-black text-gray-200 pt-28 pb-20">

        <div class="max-w-6xl mx-auto px-6">

            {{-- IMAGE SLIDER --}}
            <div
                x-data="gallery()"
                class="relative"
            >

                {{-- MAIN IMAGE --}}
                <div class="cursor-zoom-in">
                    <img
                        :src="images[active]"
                        @click="open = true"
                        class="w-full h-[300px] object-cover rounded-xl"
                    >
                </div>

                {{-- THUMBNAILS --}}
                <div class="flex gap-4 mt-4">
                    <template x-for="(img, index) in images" :key="index">
                        <img
                            :src="img"
                            @click="active = index"
                            class="w-24 h-24 object-cover rounded-lg cursor-pointer border border-neutral-700 hover:border-yellow-500 transition"
                        >
                    </template>
                </div>

                {{-- FULLSCREEN MODAL --}}
                <div
                    x-show="open"
                    x-transition.opacity
                    @keydown.escape.window="open = false"
                    class="fixed inset-0 bg-black/95 flex items-center justify-center z-[9999]"
                >

                    {{-- Close Button --}}
                    <button
                        @click="open = false"
                        class="absolute top-8 right-10 text-white text-3xl hover:text-yellow-500 transition"
                    >
                        ✕
                    </button>

                    {{-- Previous --}}
                    <button
                        @click="prev()"
                        class="absolute left-10 text-white text-4xl hover:text-yellow-500 transition"
                    >
                        ‹
                    </button>

                    {{-- Image --}}
                    <img
                        :src="images[active]"
                        class="max-h-[85vh] max-w-[90vw] object-contain transition-all duration-500"
                    >

                    {{-- Next --}}
                    <button
                        @click="next()"
                        class="absolute right-10 text-white text-4xl hover:text-yellow-500 transition"
                    >
                        ›
                    </button>

                </div>

            </div>


            <script>
                function gallery() {
                    return {
                        open: false,
                        active: 0,
                        images: [
                            @foreach($car->images as $image)
                                "{{ asset('storage/' . $image->image) }}",
                            @endforeach
                        ],

                        next() {
                            this.active = (this.active + 1) % this.images.length;
                        },

                        prev() {
                            this.active = (this.active - 1 + this.images.length) % this.images.length;
                        }
                    }
                }
            </script>
            {{-- CAR INFO --}}
            <div class="grid md:grid-cols-2 gap-20 mt-20">
                <div>
                    <div x-data="{ visible: false }"
                         x-init="setTimeout(() => visible = true, 1000)"
                         :class="visible ? 'fade-title show' : 'fade-title'">

                        <h1 class="text-5xl md:text-6xl font-semibold tracking-wide leading-tight mb-4"
                            style="font-family: 'Playfair Display', serif;">
                            {{ strtoupper($car->brand) }}
                        </h1>

                        <h2 class="text-2xl md:text-3xl text-gray-400 tracking-widest mb-6">
                            {{ $car->model }} {{ $car->year }}
                        </h2>

                        <div class="w-20 h-[2px] bg-yellow-500 mb-8"></div>

                    </div>


                    <p class="text-gray-500 uppercase tracking-widest mb-8">
                        Available Upon Request
                    </p>


                    <div class="grid grid-cols-2 gap-y-6 gap-x-12 text-sm tracking-wide">

                        <div>
                            <p class="text-gray-500 uppercase text-xs mb-1">Brand</p>
                            <p class="text-white">{{ $car->brand }}</p>
                        </div>

                        <div>
                            <p class="text-gray-500 uppercase text-xs mb-1">Model</p>
                            <p class="text-white">{{ $car->model }}</p>
                        </div>

                        <div>
                            <p class="text-gray-500 uppercase text-xs mb-1">Mileage</p>
                            <p class="text-white">{{ number_format($car->mileage) }} km</p>
                        </div>

                        <div>
                            <p class="text-gray-500 uppercase text-xs mb-1">Fuel Type</p>
                            <p class="text-white">{{ ucfirst($car->fuel_type) }}</p>
                        </div>

                        <div>
                            <p class="text-gray-500 uppercase text-xs mb-1">Transmission</p>
                            <p class="text-white">{{ ucfirst($car->transmission) }}</p>
                        </div>

                    </div>

                </div>

                <div class="relative p-8 rounded-2xl
            bg-white/5
            backdrop-blur-xl
            border border-white/10
            shadow-2xl
            overflow-hidden">

                    {{-- subtle glow --}}
                    <div class="absolute -top-20 -right-20 w-60 h-60 bg-yellow-500/10 rounded-full blur-3xl"></div>
                    <h2 class="text-xl font-semibold mb-4 text-white">
                        Interested in this vehicle?
                    </h2>

                    <button
                        @click="openTestDrive = true"
                        class="block w-full text-center bg-yellow-500 text-black py-4 rounded-lg font-semibold tracking-wider hover:bg-yellow-400 transition mb-4">
                        BOOK TEST DRIVE
                    </button>


                    <a href="#"
                       class="block text-center border border-yellow-500 text-yellow-500 py-4 rounded-lg tracking-wider hover:bg-yellow-500 hover:text-black transition">
                        CONTACT SALES
                    </a>

                </div>

            </div>

        </div>
        {{-- TEST DRIVE MODAL --}}
        <div
            x-show="openTestDrive"
            x-transition.opacity
            @keydown.escape.window="openTestDrive = false"
            class="fixed inset-0 bg-black/80 backdrop-blur-sm flex items-center justify-center z-[99999]"
        >

            <div
                @click.away="openTestDrive = false"
                x-transition
                class="bg-neutral-900 border border-yellow-500/30 rounded-2xl p-10 w-full max-w-2xl shadow-2xl relative"
            >

                <button
                    @click="openTestDrive = false"
                    class="absolute top-5 right-6 text-white text-2xl hover:text-yellow-500 transition">
                    ✕
                </button>

                <h2 class="text-3xl mb-8 text-white"
                    style="font-family: 'Playfair Display', serif;">
                    Schedule Your Test Drive
                </h2>

                <form method="POST" action="{{ route('cars.testdrive', $car) }}" class="space-y-6">
                    @csrf

                    <div class="grid md:grid-cols-2 gap-6">

                        <input type="text" name="name" placeholder="Full Name"
                               class="form-input">

                        <input type="email" name="email" placeholder="Email Address"
                               class="form-input">

                        <input type="text" name="phone" placeholder="Phone Number"
                               class="form-input">

                        <input type="date" name="preferred_date"
                               class="form-input">

                        <input type="text" name="preferred_time" placeholder="Preferred Time (optional)"
                               class="form-input md:col-span-2">

                        <textarea name="message" placeholder="Additional message (optional)"
                                  rows="3"
                                  class="form-input md:col-span-2 resize-none"></textarea>

                    </div>

                    <button
                        type="submit"
                        class="w-full bg-yellow-500 text-black py-4 rounded-lg font-semibold tracking-wider hover:bg-yellow-400 transition">
                        CONFIRM REQUEST
                    </button>

                </form>

            </div>

        </div>
    </section>
    {{-- SIMILAR VEHICLES --}}
    @if($similarCars->count())

        <section class="mt-24">

            <h2 class="text-3xl font-bold text-center mb-12 text-white"
                style="font-family: 'Playfair Display', serif;">
                Similar Vehicles
            </h2>

            <div class="grid md:grid-cols-3 gap-8">

                @foreach($similarCars as $similar)
                    <a href="{{ route('cars.show', $similar) }}"
                       class="group bg-gray-900 rounded overflow-hidden border border-gray-800 hover:border-yellow-500 transition">

                        <div class="h-56 overflow-hidden">
                            @if($similar->images->first())
                                <img src="{{ asset('storage/'.$similar->images->first()->image) }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            @endif
                        </div>

                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-white mb-2">
                                {{ $similar->title }}
                            </h3>

                            <p class="text-gray-500 text-sm uppercase tracking-widest">
                                View Vehicle
                            </p>

                        </div>
                    </a>
                @endforeach

            </div>

        </section>

    @endif
    <section class="mt-32 relative">

        <div class="absolute inset-0 bg-gradient-to-b from-transparent via-yellow-500/5 to-transparent blur-3xl"></div>

        <div class="max-w-6xl mx-auto px-6 relative z-10">

            <h2 class="text-3xl md:text-4xl font-semibold text-center mb-16"
                style="font-family: 'Playfair Display', serif;">
                The DriveOne Experience
            </h2>

            <div class="grid md:grid-cols-3 gap-12 text-center">

                <div class="trust-card">
                    <div class="text-yellow-500 text-4xl mb-6">✓</div>
                    <h3 class="text-xl mb-3">Certified Vehicles</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Every vehicle undergoes a complete multi-point inspection before entering our showroom.
                    </p>
                </div>

                <div class="trust-card">
                    <div class="text-yellow-500 text-4xl mb-6">🛡</div>
                    <h3 class="text-xl mb-3">Warranty Included</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        We stand behind every vehicle with extended protection plans.
                    </p>
                </div>

                <div class="trust-card">
                    <div class="text-yellow-500 text-4xl mb-6">🚚</div>
                    <h3 class="text-xl mb-3">Nationwide Delivery</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Seamless and secure vehicle delivery to your doorstep.
                    </p>
                </div>

            </div>

        </div>

    </section>



@endsection
