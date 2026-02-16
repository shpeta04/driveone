@extends('layouts.app')

@section('content')

    <section
        x-data="{ shown: false }"
        x-intersect="shown = true"
        :class="shown ? 'reveal-active' : 'reveal'"
        class="bg-neutral-950 pt-28 pb-24 min-h-screen transition-all duration-700">

        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-4 gap-12">

            {{-- FILTER SIDEBAR --}}
            <div class="md:col-span-1 bg-neutral-900 p-6 rounded-xl border border-gray-800 h-fit">

                <h3 class="text-lg font-semibold mb-6 text-yellow-500 tracking-wider">
                    FILTER VEHICLES
                </h3>

                <form method="GET" class="space-y-4">

                    <input type="text" name="brand" placeholder="Brand"
                           value="{{ request('brand') }}"
                           class="w-full bg-black border border-gray-700 rounded px-4 py-2 focus:ring-2 focus:ring-yellow-500">

                    <input type="number" name="min_price" placeholder="Min Price"
                           value="{{ request('min_price') }}"
                           class="w-full bg-black border border-gray-700 rounded px-4 py-2">

                    <input type="number" name="max_price" placeholder="Max Price"
                           value="{{ request('max_price') }}"
                           class="w-full bg-black border border-gray-700 rounded px-4 py-2">

                    <input type="number" name="year" placeholder="Year"
                           value="{{ request('year') }}"
                           class="w-full bg-black border border-gray-700 rounded px-4 py-2">

                    <select name="fuel_type"
                            class="w-full bg-black border border-gray-700 rounded px-4 py-2">
                        <option value="">Fuel Type</option>
                        <option value="petrol">Petrol</option>
                        <option value="diesel">Diesel</option>
                        <option value="electric">Electric</option>
                        <option value="hybrid">Hybrid</option>
                    </select>

                    <select name="transmission"
                            class="w-full bg-black border border-gray-700 rounded px-4 py-2">
                        <option value="">Transmission</option>
                        <option value="manual">Manual</option>
                        <option value="automatic">Automatic</option>
                    </select>

                    <select name="sort"
                            class="w-full bg-black border border-gray-700 rounded px-4 py-2">
                        <option value="">Sort By</option>
                        <option value="price_low">Price: Low to High</option>
                        <option value="price_high">Price: High to Low</option>
                    </select>

                    <button class="w-full bg-yellow-500 text-black font-semibold py-2 rounded hover:bg-yellow-400 transition">
                        Apply Filters
                    </button>

                </form>

            </div>

            {{-- CAR GRID --}}
            <div class="md:col-span-3 grid md:grid-cols-3 gap-10">

                    @forelse($cars as $index => $car)

                        <a
                            x-data="{ visible: false }"
                            x-init="setTimeout(() => visible = true, {{ $index * 120 }})"
                            :class="visible ? 'fade-item show' : 'fade-item'"
                            href="{{ route('cars.show', $car) }}"
                            class="group bg-neutral-900 rounded-xl overflow-hidden border border-neutral-800 hover:border-yellow-500 hover:-translate-y-2 transition-all duration-300">


                        <div class="h-64 overflow-hidden bg-black">
                            @if($car->images->first())
                                <img src="{{ asset('storage/'.$car->images->first()->image) }}"
                                     class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
                            @else
                                <div class="h-full flex items-center justify-center border-neutral-800 text-gray-600">
                                    No Image
                                </div>
                            @endif
                        </div>

                        <div class="p-6 bg-neutral-950">

                            <h3 class="text-lg font-semibold text-white tracking-wide">
                                {{ $car->title }}
                            </h3>

                            <div class="w-12 h-[2px] bg-yellow-500 my-4"></div>

                            <p class="text-neutral-400 text-sm mb-4 tracking-wider">
                                {{ $car->year }} • {{ ucfirst($car->fuel_type) }} • {{ ucfirst($car->transmission) }}
                            </p>

                            <p class="text-yellow-500 font-semibold text-xl tracking-wide">
                                €{{ number_format($car->price) }}
                            </p>

                        </div>
                    </a>
                @empty
                    <div class="col-span-3 text-center text-gray-500">
                        No vehicles found.
                    </div>
                @endforelse

            </div>

        </div>

        {{-- PAGINATION --}}
        <div class="mt-16 flex justify-center">
            {{ $cars->withQueryString()->links() }}
        </div>

    </section>

@endsection
