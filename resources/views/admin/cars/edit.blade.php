<x-app-layout>
    <div class="max-w-4xl mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Edit Car</h1>

        <form method="POST"
              action="{{ route('admin.cars.update', $car) }}"
              class="bg-white p-6 rounded shadow space-y-4">
            @csrf
            @method('PUT')

            <input name="title"
                   value="{{ old('title', $car->title) }}"
                   class="w-full border p-2"
                   required>

            <input name="brand"
                   value="{{ old('brand', $car->brand) }}"
                   class="w-full border p-2"
                   required>

            <input name="model"
                   value="{{ old('model', $car->model) }}"
                   class="w-full border p-2"
                   required>

            <input type="number"
                   name="year"
                   value="{{ old('year', $car->year) }}"
                   class="w-full border p-2">

            <input type="number"
                   name="mileage"
                   value="{{ old('mileage', $car->mileage) }}"
                   class="w-full border p-2">

            <select name="fuel_type" class="w-full border p-2">
                <option value="petrol" {{ $car->fuel_type == 'petrol' ? 'selected' : '' }}>Petrol</option>
                <option value="diesel" {{ $car->fuel_type == 'diesel' ? 'selected' : '' }}>Diesel</option>
                <option value="electric" {{ $car->fuel_type == 'electric' ? 'selected' : '' }}>Electric</option>
                <option value="hybrid" {{ $car->fuel_type == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
            </select>

            <select name="transmission" class="w-full border p-2">
                <option value="manual" {{ $car->transmission == 'manual' ? 'selected' : '' }}>Manual</option>
                <option value="automatic" {{ $car->transmission == 'automatic' ? 'selected' : '' }}>Automatic</option>
            </select>

            <input type="number"
                   step="0.01"
                   name="price"
                   value="{{ old('price', $car->price) }}"
                   class="w-full border p-2">

            <textarea name="description"
                      class="w-full border p-2">{{ old('description', $car->description) }}</textarea>

            <label class="flex items-center gap-2">
                <input type="checkbox"
                       name="is_sold"
                       value="1"
                    {{ $car->is_sold ? 'checked' : '' }}>
                Mark as Sold
            </label>

            <button class="bg-blue-600 text-white px-4 py-2 rounded">
                Update Car
            </button>
        </form>
    </div>
</x-app-layout>
