@extends('admin.layout')

@section('content')

    <div class="max-w-4xl mx-auto py-10">

        <h1 class="text-3xl font-bold mb-8">Add New Vehicle</h1>

        <form action="{{ route('admin.cars.store') }}"
              method="POST"
              enctype="multipart/form-data"
              class="space-y-6">

            @csrf

            <div>
                <label class="block mb-2">Title</label>
                <input type="text" name="title" class="form-input w-full" required>
            </div>

            <div class="grid grid-cols-2 gap-6">

                <div>
                    <label>Brand</label>
                    <input type="text" name="brand" class="form-input w-full" required>
                </div>

                <div>
                    <label>Model</label>
                    <input type="text" name="model" class="form-input w-full" required>
                </div>

                <div>
                    <label>Year</label>
                    <input type="number" name="year" class="form-input w-full" required>
                </div>

                <div>
                    <label>Mileage</label>
                    <input type="number" name="mileage" class="form-input w-full">
                </div>

                <div>
                    <label>Fuel Type</label>
                    <select name="fuel_type" class="form-input w-full">
                        <option>petrol</option>
                        <option>diesel</option>
                        <option>electric</option>
                        <option>hybrid</option>
                    </select>
                </div>

                <div>
                    <label>Transmission</label>
                    <select name="transmission" class="form-input w-full">
                        <option>automatic</option>
                        <option>manual</option>
                    </select>
                </div>

            </div>

            <div>
                <label class="block mb-2">Images</label>

                <input
                    type="file"
                    name="images[]"
                    multiple
                    class="form-input w-full"
                >
            </div>

            <button class="bg-yellow-500 text-black px-6 py-3 rounded font-semibold">
                Create Vehicle
            </button>

        </form>

    </div>

@endsection
