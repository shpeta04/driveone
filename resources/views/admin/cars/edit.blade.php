@extends('admin.layout')

@section('content')

    <div class="max-w-5xl">

        <h1 class="text-3xl font-bold mb-8">Edit Vehicle</h1>

        <form method="POST"
              action="{{ route('admin.cars.update', $car) }}"
              enctype="multipart/form-data"
              class="space-y-6">

            @csrf
            @method('PUT')


            {{-- Title --}}
            <div>
                <label class="block text-sm text-neutral-400 mb-2">
                    Title
                </label>

                <input type="text"
                       name="title"
                       value="{{ $car->title }}"
                       class="w-full bg-neutral-950 border border-neutral-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-yellow-500">
            </div>


            {{-- Brand --}}
            <div>
                <label class="block text-sm text-neutral-400 mb-2">
                    Brand
                </label>

                <input type="text"
                       name="brand"
                       value="{{ $car->brand }}"
                       class="w-full bg-neutral-950 border border-neutral-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-yellow-500">
            </div>


            {{-- Model --}}
            <div>
                <label class="block text-sm text-neutral-400 mb-2">
                    Model
                </label>

                <input type="text"
                       name="model"
                       value="{{ $car->model }}"
                       class="w-full bg-neutral-950 border border-neutral-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-yellow-500">
            </div>


            {{-- Images --}}
            <div>

                <label class="block text-sm text-neutral-400 mb-2">
                    Current Images
                </label>

                <div class="flex gap-4 flex-wrap">

                    @foreach($car->images as $image)
                        <img src="{{ asset('storage/'.$image->image) }}"
                             class="w-32 h-24 object-cover rounded-lg border border-neutral-700">
                    @endforeach

                </div>

            </div>


            {{-- Add new images --}}
            <div>
                <label class="block text-sm text-neutral-400 mb-2">
                    Add New Images
                </label>

                <input type="file"
                       name="images[]"
                       multiple
                       class="block w-full text-sm text-neutral-400">
            </div>


            {{-- Button --}}
            <button type="submit"
                    class="bg-yellow-500 hover:bg-yellow-400 text-black px-6 py-3 rounded-lg font-semibold">
                Update Vehicle
            </button>

        </form>

    </div>

@endsection
