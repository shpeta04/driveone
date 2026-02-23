@extends('admin.layout')

@section('content')
    <h1 class="text-3xl font-semibold mb-8">Add User</h1>

    <form action="{{ route('admin.users.store') }}" method="POST"
          class="bg-neutral-900/40 border border-neutral-800 rounded-2xl p-8 space-y-6 max-w-2xl">
        @csrf

        <div>
            <label class="block text-sm text-neutral-400 mb-2">Name</label>
            <input name="name" value="{{ old('name') }}"
                   class="w-full bg-black border border-neutral-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-yellow-500">
            @error('name') <p class="text-red-400 text-sm mt-2">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm text-neutral-400 mb-2">Email</label>
            <input name="email" type="email" value="{{ old('email') }}"
                   class="w-full bg-black border border-neutral-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-yellow-500">
            @error('email') <p class="text-red-400 text-sm mt-2">{{ $message }}</p> @enderror
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm text-neutral-400 mb-2">Password</label>
                <input name="password" type="password"
                       class="w-full bg-black border border-neutral-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-yellow-500">
                @error('password') <p class="text-red-400 text-sm mt-2">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm text-neutral-400 mb-2">Confirm Password</label>
                <input name="password_confirmation" type="password"
                       class="w-full bg-black border border-neutral-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-yellow-500">
            </div>
        </div>

        <label class="flex items-center gap-3">
            <input type="checkbox" name="is_admin" value="1"
                   class="h-5 w-5 rounded border-neutral-600 bg-black text-yellow-500">
            <span class="text-neutral-300">Make this user an Admin</span>
        </label>

        <div class="flex gap-3">
            <button class="bg-yellow-500 text-black px-6 py-3 rounded-lg font-semibold hover:bg-yellow-400 transition">
                Save
            </button>
            <a href="{{ route('admin.users.index') }}"
               class="px-6 py-3 rounded-lg border border-neutral-700 hover:border-yellow-500 transition">
                Cancel
            </a>
        </div>
    </form>
@endsection
