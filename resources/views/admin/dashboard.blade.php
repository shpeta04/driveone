@extends('admin.layout')

@section('title','Dashboard')

@section('content')

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">


        <div class="bg-neutral-900 p-6 rounded-xl border border-neutral-800">
            <p class="text-neutral-400 text-sm">Total Cars</p>
            <h2 class="text-3xl font-semibold mt-2">
                {{ \App\Models\Car::count() }}
            </h2>
        </div>

        <div class="bg-neutral-900 p-6 rounded-xl border border-neutral-800 hover:border-yellow-500/40 transition">

            <p class="text-neutral-400 text-sm uppercase tracking-wider">
                Total Cars
            </p>

            <h2 class="text-3xl font-semibold mt-2 text-white">
                {{ \App\Models\Car::count() }}
            </h2>

        </div>

        <div class="bg-neutral-900 p-6 rounded-xl border border-neutral-800">
            <p class="text-neutral-400 text-sm">Sold Cars</p>
            <h2 class="text-3xl font-semibold mt-2">
                {{ \App\Models\Car::where('is_sold', true)->count() }}
            </h2>
        </div>

        <div class="bg-neutral-900 p-6 rounded-xl border border-neutral-800">
            <p class="text-neutral-400 text-sm">Test Drive Requests</p>
            <h2 class="text-3xl font-semibold mt-2">
                {{ \App\Models\TestDrive::count() ?? 0 }}
            </h2>
        </div>

    </div>

@endsection
