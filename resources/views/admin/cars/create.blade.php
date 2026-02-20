@extends('admin.layout')

@section('content')

    <div class="max-w-5xl">

        <h1 class="text-3xl font-bold mb-8">Add Vehicle</h1>

        <form method="POST"
              action="{{ route('admin.cars.store') }}"
              enctype="multipart/form-data"
              class="space-y-6">

            @csrf

            {{-- Title --}}
            <div>
                <label class="block text-sm text-neutral-400 mb-2">
                    Title
                </label>

                <input type="text"
                       name="title"
                       required
                       class="w-full bg-neutral-950 border border-neutral-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-yellow-500">
            </div>


            {{-- Brand --}}
            <div>
                <label class="block text-sm text-neutral-400 mb-2">
                    Brand
                </label>

                <input type="text"
                       name="brand"
                       required
                       class="w-full bg-neutral-950 border border-neutral-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-yellow-500">
            </div>


            {{-- Model --}}
            <div>
                <label class="block text-sm text-neutral-400 mb-2">
                    Model
                </label>

                <input type="text"
                       name="model"
                       required
                       class="w-full bg-neutral-950 border border-neutral-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-yellow-500">
            </div>


            {{-- Year --}}
            <div>
                <label class="block text-sm text-neutral-400 mb-2">
                    Year
                </label>

                <input type="number"
                       name="year"
                       required
                       class="w-full bg-neutral-950 border border-neutral-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-yellow-500">
            </div>


            {{-- Mileage --}}
            <div>
                <label class="block text-sm text-neutral-400 mb-2">
                    Mileage
                </label>

                <input type="number"
                       name="mileage"
                       required
                       class="w-full bg-neutral-950 border border-neutral-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-yellow-500">
            </div>


            {{-- Fuel --}}
            <div>
                <label class="block text-sm text-neutral-400 mb-2">
                    Fuel Type
                </label>

                <select name="fuel_type"
                        class="w-full bg-neutral-950 border border-neutral-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-yellow-500">

                    <option value="petrol">Petrol</option>
                    <option value="diesel">Diesel</option>
                    <option value="electric">Electric</option>

                </select>
            </div>


            {{-- Transmission --}}
            <div>
                <label class="block text-sm text-neutral-400 mb-2">
                    Transmission
                </label>

                <select name="transmission"
                        class="w-full bg-neutral-950 border border-neutral-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-yellow-500">

                    <option value="automatic">Automatic</option>
                    <option value="manual">Manual</option>

                </select>
            </div>


            {{-- Images --}}
            <div>
                <label class="block text-sm text-neutral-400 mb-2">
                    Images
                </label>

                <input type="file"
                       name="images[]"
                       multiple
                       class="block w-full text-sm text-neutral-400">
            </div>


            {{-- Button --}}
            <button type="submit"
                    class="bg-yellow-500 hover:bg-yellow-400 text-black px-6 py-3 rounded-lg font-semibold">
                Create Vehicle
            </button>

        </form>

    </div>

@endsection
