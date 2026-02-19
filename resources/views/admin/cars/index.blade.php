@extends('admin.layout')

@section('title','Cars Management')

@section('content')

    <div class="flex justify-between items-center mb-8">

        <h1 class="text-2xl font-semibold">Cars</h1>

        <a href="{{ route('admin.cars.create') }}"
           class="bg-yellow-500 text-black px-6 py-3 rounded-lg font-semibold hover:bg-yellow-400 transition">
            + Add Car
        </a>

    </div>


    <div class="bg-neutral-900 border border-neutral-800 rounded-xl overflow-hidden">

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

@endsection
