@extends('admin.layouts.app')

@section('content')

    <div class="max-w-7xl mx-auto">

        <h1 class="text-3xl text-white mb-8">
            Test Drive Requests
        </h1>

        <div class="bg-neutral-900 rounded-xl overflow-hidden">

            <table class="w-full text-left">

                <thead class="bg-black border-b border-neutral-800">
                <tr class="text-neutral-400 text-sm uppercase">

                    <th class="p-4">Vehicle</th>
                    <th class="p-4">Name</th>
                    <th class="p-4">Email</th>
                    <th class="p-4">Phone</th>
                    <th class="p-4">Date</th>
                    <th class="p-4"></th>

                </tr>
                </thead>

                <tbody>

                @foreach($testdrives as $request)

                    <tr class="border-b border-neutral-800">

                        <td class="p-4 text-white">
                            {{ $request->car->brand }} {{ $request->car->model }}
                        </td>

                        <td class="p-4">{{ $request->name }}</td>

                        <td class="p-4">{{ $request->email }}</td>

                        <td class="p-4">{{ $request->phone }}</td>

                        <td class="p-4">{{ $request->preferred_date }}</td>

                        <td class="p-4">

                            <form method="POST"
                                  action="{{ route('admin.testdrives.destroy', $request) }}">

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

    </div>

@endsection
