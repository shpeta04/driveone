@extends('admin.layout')

@section('content')

    <div class="max-w-5xl mx-auto py-10">

        <h1 class="text-3xl font-bold mb-8">Edit Vehicle</h1>

        <form method="POST"
              action="{{ route('admin.cars.update', $car) }}"
              enctype="multipart/form-data"
              class="space-y-6">

            @csrf
            @method('PUT')

            <input type="text"
                   name="title"
                   value="{{ $car->title }}"
                   class="form-input w-full">

            <input type="text"
                   name="brand"
                   value="{{ $car->brand }}"
                   class="form-input w-full">

            <input type="text"
                   name="model"
                   value="{{ $car->model }}"
                   class="form-input w-full">

            <input type="number"
                   name="year"
                   value="{{ $car->year }}"
                   class="form-input w-full">

            <input type="number"
                   name="mileage"
                   value="{{ $car->mileage }}"
                   class="form-input w-full">

            <select name="fuel_type" class="form-input w-full">
                <option {{ $car->fuel_type == 'petrol' ? 'selected':'' }}>petrol</option>
                <option {{ $car->fuel_type == 'diesel' ? 'selected':'' }}>diesel</option>
                <option {{ $car->fuel_type == 'electric' ? 'selected':'' }}>electric</option>
                <option {{ $car->fuel_type == 'hybrid' ? 'selected':'' }}>hybrid</option>
            </select>

            <select name="transmission" class="form-input w-full">
                <option {{ $car->transmission == 'automatic' ? 'selected':'' }}>automatic</option>
                <option {{ $car->transmission == 'manual' ? 'selected':'' }}>manual</option>
            </select>

            <div>
                <label>Add New Images</label>

                <input type="file"
                       name="images[]"
                       multiple
                       class="form-input w-full">
            </div>

            <button class="bg-yellow-500 px-6 py-3 rounded">
                Update Vehicle
            </button>

        </form>

        <hr class="my-10">

        <h2 class="text-xl mb-4">Current Images</h2>

        <div class="grid grid-cols-4 gap-6">

            @foreach($car->images as $image)

                <div class="relative">

                    <img src="{{ asset('storage/'.$image->image) }}"
                         class="rounded-lg">

                    <form method="POST"
                          action="{{ route('admin.car-images.delete', $image) }}">

                        @csrf
                        @method('DELETE')

                        <button class="absolute top-2 right-2 bg-red-600 text-white px-2 py-1 rounded">
                            Delete
                        </button>

                    </form>

                </div>

            @endforeach

        </div>

    </div>

@endsection
