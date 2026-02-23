@extends('admin.layout')

@section('title','Cars Management')

@section('content')

    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-8">
        <h1 class="text-2xl font-semibold">Cars</h1>

        <a href="{{ route('admin.cars.create') }}"
           class="bg-yellow-500 text-black px-6 py-3 rounded-lg font-semibold hover:bg-yellow-400 transition">
            + Add Car
        </a>

    </div>


    <div class="bg-neutral-900 border border-neutral-800 rounded-xl overflow-hidden hidden lg:block">
        <table class="w-full">

            <thead class="border-b border-neutral-800 text-neutral-400 text-sm">

            <tr>

                <th class="text-left p-4">Image</th>

                <th class="text-left p-4">Car</th>

                <th class="text-left p-4">Brand</th>

                <th class="text-left p-4">Year</th>

                <th class="text-left p-4">Status</th>

                <th class="text-right p-4">Actions</th>

            </tr>

            </thead>

            <tbody>

            @foreach($cars as $car)

                <tr class="border-b border-neutral-800 hover:bg-neutral-800 transition">

                    <td class="p-4">

                        @if($car->images->first())
                            <img src="{{ asset('storage/'.$car->images->first()->image) }}"
                                 class="w-20 h-14 object-cover rounded">
                        @endif

                    </td>

                    <td class="p-4 font-semibold">

                        {{ $car->brand }} {{ $car->model }}

                    </td>

                    <td class="p-4">

                        {{ $car->brand }}

                    </td>

                    <td class="p-4">

                        {{ $car->year }}

                    </td>

                    <td class="p-4">

                        @if($car->is_sold)

                            <span class="text-red-500">Sold</span>

                        @else

                            <span class="text-green-500">Available</span>

                        @endif

                    </td>

                    <td class="p-4 text-right space-x-3">

                        <a href="{{ route('admin.cars.edit',$car) }}"
                           class="text-blue-400 hover:text-blue-300">
                            Edit
                        </a>

                        <form action="{{ route('admin.cars.destroy',$car) }}"
                              method="POST"
                              class="inline">

                            @csrf
                            @method('DELETE')

                            <button class="text-red-500 hover:text-red-400">
                                Delete
                            </button>

                        </form>

                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>

    </div>
    {{-- MOBILE VIEW --}}
    <div class="lg:hidden space-y-4">

        @foreach($cars as $car)

            <div class="bg-neutral-900 border border-neutral-800 rounded-xl p-4">

                {{-- IMAGE --}}
                @if($car->images->first())
                    <img src="{{ asset('storage/'.$car->images->first()->image) }}"
                         class="w-full h-40 object-cover rounded mb-4">
                @endif

                {{-- INFO --}}
                <div class="space-y-1">

                    <div class="font-semibold text-lg">
                        {{ $car->brand }} {{ $car->model }}
                    </div>

                    <div class="text-neutral-400 text-sm">
                        Year: {{ $car->year }}
                    </div>

                    <div class="text-sm">

                        @if($car->is_sold)
                            <span class="text-red-500">Sold</span>
                        @else
                            <span class="text-green-500">Available</span>
                        @endif

                    </div>

                </div>

                {{-- ACTIONS --}}
                <div class="flex gap-4 mt-4">

                    <a href="{{ route('admin.cars.edit',$car) }}"
                       class="flex-1 text-center bg-blue-500 py-2 rounded hover:bg-blue-600 transition">
                        Edit
                    </a>

                    <form action="{{ route('admin.cars.destroy',$car) }}"
                          method="POST"
                          class="flex-1">

                        @csrf
                        @method('DELETE')

                        <button class="w-full bg-red-500 py-2 rounded hover:bg-red-600 transition">
                            Delete
                        </button>

                    </form>

                </div>

            </div>

        @endforeach

    </div>

@endsection
