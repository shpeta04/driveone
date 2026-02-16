<x-app-layout>
    <div class="max-w-7xl mx-auto py-8">
        <div class="flex justify-between mb-6">
            <h1 class="text-2xl font-bold">Cars</h1>
            <a href="{{ route('admin.cars.create') }}"
               class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded shadow">
                + Add Car
            </a>

        </div>

        <table class="w-full bg-white shadow rounded">
            <thead>
            <tr class="border-b">
                <th class="p-3 text-left">Title</th>
                <th class="p-3">Price</th>
                <th class="p-3">Status</th>
                <th class="p-3">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cars as $car)
                <tr class="border-b">
                    <td class="p-3">{{ $car->title }}</td>
                    <td class="p-3">€{{ number_format($car->price) }}</td>
                    <td class="p-3">
                        {{ $car->is_sold ? 'Sold' : 'Available' }}
                    </td>
                    <td class="p-3 flex gap-2">
                        <a href="{{ route('admin.cars.edit', $car) }}"
                           class="text-blue-600">Edit</a>

                        <form action="{{ route('admin.cars.destroy', $car) }}"
                              method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600"
                                    onclick="return confirm('Delete this car?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
