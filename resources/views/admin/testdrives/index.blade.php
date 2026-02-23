@extends('admin.layout')

@section('content')

    <div class="max-w-7xl mx-auto">

        <h1 class="text-3xl text-white mb-8">
            Test Drive Requests
        </h1>


        {{-- DESKTOP TABLE --}}
        <div class="bg-neutral-900 rounded-xl overflow-hidden hidden lg:block">

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

                    <tr class="border-b border-neutral-800 hover:bg-neutral-800 transition">

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


        {{-- MOBILE CARD VIEW --}}
        <div class="lg:hidden space-y-4">

            @foreach($testdrives as $request)

                <div class="bg-neutral-900 border border-neutral-800 rounded-xl p-4">

                    <div class="text-white font-semibold text-lg mb-2">
                        {{ $request->car->brand }} {{ $request->car->model }}
                    </div>

                    <div class="text-neutral-400 text-sm">
                        {{ $request->name }}
                    </div>

                    <div class="text-neutral-400 text-sm">
                        {{ $request->email }}
                    </div>

                    <div class="text-neutral-400 text-sm">
                        {{ $request->phone }}
                    </div>

                    <div class="text-neutral-400 text-sm mt-2">
                        Preferred Date:
                        <span class="text-white">
                        {{ $request->preferred_date }}
                    </span>
                    </div>


                    <form method="POST"
                          action="{{ route('admin.testdrives.destroy', $request) }}"
                          class="mt-4">

                        @csrf
                        @method('DELETE')

                        <button class="w-full bg-red-500 py-2 rounded hover:bg-red-600 transition">
                            Delete Request
                        </button>

                    </form>

                </div>

            @endforeach

        </div>


    </div>

@endsection
