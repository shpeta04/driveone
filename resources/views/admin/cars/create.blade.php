<x-app-layout>
    <div class="max-w-4xl mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Add New Car</h1>

        <form method="POST" action="{{ route('admin.cars.store') }}"
              class="bg-white p-6 rounded shadow space-y-4">
            @csrf

            <input name="title" placeholder="Title" class="w-full border p-2" required>
            <input name="brand" placeholder="Brand" class="w-full border p-2" required>
            <input name="model" placeholder="Model" class="w-full border p-2" required>
            <input name="year" type="number" placeholder="Year" class="w-full border p-2">
            <input name="mileage" type="number" placeholder="Mileage" class="w-full border p-2">

            <select name="fuel_type" class="w-full border p-2">
                <option value="petrol">Petrol</option>
                <option value="diesel">Diesel</option>
                <option value="electric">Electric</option>
                <option value="hybrid">Hybrid</option>
            </select>

            <select name="transmission" class="w-full border p-2">
                <option value="manual">Manual</option>
                <option value="automatic">Automatic</option>
            </select>

            <input name="price" type="number" step="0.01"
                   placeholder="Price" class="w-full border p-2">

            <textarea name="description"
                      placeholder="Description"
                      class="w-full border p-2"></textarea>

            <button class="bg-blue-600 text-white px-4 py-2 rounded">
                Save Car
            </button>
        </form>
    </div>
</x-app-layout>
