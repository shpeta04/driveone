@extends('admin.layout')

@section('content')
    <div class="max-w-6xl mx-auto px-6 py-12 space-y-10">
        <div class="overflow-hidden rounded-3xl border border-yellow-200/30 bg-gradient-to-br from-zinc-950 via-zinc-900 to-zinc-800 shadow-2xl">
            <div class="border-b border-yellow-300/20 px-8 py-8 md:px-12">
                <p class="text-xs uppercase tracking-[0.35em] text-yellow-400">DriveOne Concierge</p>
                <h1 class="mt-3 text-3xl font-semibold text-white md:text-4xl">Edit Luxury Vehicle</h1>
                <p class="mt-3 max-w-3xl text-sm text-zinc-300 md:text-base">
                    Refine the listing details and keep the gallery curated for a premium showroom experience.
                </p>
            </div>

            <form method="POST"
                  action="{{ route('admin.cars.update', $car) }}"
                  enctype="multipart/form-data"
                  class="space-y-8 px-8 py-10 md:px-12">
                @csrf
                @method('PUT')

                <div>
                    <label for="title" class="mb-2 block text-sm font-medium uppercase tracking-widest text-zinc-300">Title</label>
                    <input id="title" type="text" name="title" value="{{ old('title', $car->title) }}" class="w-full rounded-xl border border-zinc-700 bg-zinc-900/70 px-4 py-3 text-white focus:border-yellow-400 focus:outline-none focus:ring-2 focus:ring-yellow-400/30">
                </div>

                <div class="grid gap-6 md:grid-cols-2">
                    <div>
                        <label for="brand" class="mb-2 block text-sm font-medium uppercase tracking-widest text-zinc-300">Brand</label>
                        <input id="brand" type="text" name="brand" value="{{ old('brand', $car->brand) }}" class="w-full rounded-xl border border-zinc-700 bg-zinc-900/70 px-4 py-3 text-white focus:border-yellow-400 focus:outline-none focus:ring-2 focus:ring-yellow-400/30">
                    </div>

                    <div>
                        <label for="model" class="mb-2 block text-sm font-medium uppercase tracking-widest text-zinc-300">Model</label>
                        <input id="model" type="text" name="model" value="{{ old('model', $car->model) }}" class="w-full rounded-xl border border-zinc-700 bg-zinc-900/70 px-4 py-3 text-white focus:border-yellow-400 focus:outline-none focus:ring-2 focus:ring-yellow-400/30">
                    </div>

                    <div>
                        <label for="year" class="mb-2 block text-sm font-medium uppercase tracking-widest text-zinc-300">Year</label>
                        <input id="year" type="number" name="year" value="{{ old('year', $car->year) }}" class="w-full rounded-xl border border-zinc-700 bg-zinc-900/70 px-4 py-3 text-white focus:border-yellow-400 focus:outline-none focus:ring-2 focus:ring-yellow-400/30">
                    </div>

                    <div>
                        <label for="mileage" class="mb-2 block text-sm font-medium uppercase tracking-widest text-zinc-300">Mileage</label>
                        <input id="mileage" type="number" name="mileage" value="{{ old('mileage', $car->mileage) }}" class="w-full rounded-xl border border-zinc-700 bg-zinc-900/70 px-4 py-3 text-white focus:border-yellow-400 focus:outline-none focus:ring-2 focus:ring-yellow-400/30">
                    </div>

                    <div>
                        <label for="fuel_type" class="mb-2 block text-sm font-medium uppercase tracking-widest text-zinc-300">Fuel Type</label>
                        <select id="fuel_type" name="fuel_type" class="w-full rounded-xl border border-zinc-700 bg-zinc-900/70 px-4 py-3 text-white focus:border-yellow-400 focus:outline-none focus:ring-2 focus:ring-yellow-400/30">
                            <option value="petrol" {{ old('fuel_type', $car->fuel_type) == 'petrol' ? 'selected':'' }}>petrol</option>
                            <option value="diesel" {{ old('fuel_type', $car->fuel_type) == 'diesel' ? 'selected':'' }}>diesel</option>
                            <option value="electric" {{ old('fuel_type', $car->fuel_type) == 'electric' ? 'selected':'' }}>electric</option>
                            <option value="hybrid" {{ old('fuel_type', $car->fuel_type) == 'hybrid' ? 'selected':'' }}>hybrid</option>
                        </select>
                    </div>

                    <div>
                        <label for="transmission" class="mb-2 block text-sm font-medium uppercase tracking-widest text-zinc-300">Transmission</label>
                        <select id="transmission" name="transmission" class="w-full rounded-xl border border-zinc-700 bg-zinc-900/70 px-4 py-3 text-white focus:border-yellow-400 focus:outline-none focus:ring-2 focus:ring-yellow-400/30">
                            <option value="automatic" {{ old('transmission', $car->transmission) == 'automatic' ? 'selected':'' }}>automatic</option>
                            <option value="manual" {{ old('transmission', $car->transmission) == 'manual' ? 'selected':'' }}>manual</option>
                        </select>
                    </div>
                </div>

                <div class="rounded-2xl border border-zinc-700/60 bg-zinc-900/60 p-6">
                    <label for="images" class="mb-2 block text-sm font-medium uppercase tracking-widest text-zinc-300">Add New Images</label>
                    <input id="images" type="file" name="images[]" multiple class="w-full rounded-xl border border-dashed border-zinc-600 bg-zinc-950/70 px-4 py-6 text-sm text-zinc-300 file:mr-4 file:rounded-lg file:border-0 file:bg-yellow-500 file:px-4 file:py-2 file:font-semibold file:text-black hover:file:bg-yellow-400">
                </div>

                <div class="flex justify-end">
                    <button class="rounded-xl bg-yellow-500 px-8 py-3 text-sm font-semibold uppercase tracking-wider text-black transition hover:bg-yellow-400">
                        Update Vehicle
                    </button>
                </div>
            </form>
        </div>

        <div class="rounded-3xl border border-zinc-700 bg-zinc-900/70 p-8 shadow-2xl">
            <h2 class="text-xl font-semibold text-white">Current Images</h2>
            <p class="mt-2 text-sm text-zinc-400">Maintain a refined gallery by removing any outdated shots.</p>

            <div class="mt-6 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach($car->images as $image)
                    <div class="group relative overflow-hidden rounded-2xl border border-zinc-700 bg-zinc-950">
                        <img src="{{ asset('storage/'.$image->image) }}" class="h-52 w-full object-cover transition duration-300 group-hover:scale-105">

                        <form method="POST"
                              action="{{ route('admin.car-images.delete', $image) }}"
                              class="absolute right-3 top-3">
                            @csrf
                            @method('DELETE')

                            <button class="rounded-lg bg-red-600/90 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-white transition hover:bg-red-500">
                                Delete
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
