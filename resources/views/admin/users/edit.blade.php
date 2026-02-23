@extends('admin.layout')

@section('content')
    <h1 class="text-3xl font-semibold mb-8">Edit User</h1>

    @if(session('success'))
        <div class="mb-6 bg-green-500/10 border border-green-500/20 text-green-300 px-4 py-3 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid lg:grid-cols-2 gap-8">

        {{-- UPDATE INFO --}}
        <form action="{{ route('admin.users.update', $user) }}" method="POST"
              class="bg-neutral-900/40 border border-neutral-800 rounded-2xl p-8 space-y-6">
            @csrf
            @method('PUT')

            <h2 class="text-xl font-semibold">Account Info</h2>

            <div>
                <label class="block text-sm text-neutral-400 mb-2">Name</label>
                <input name="name" value="{{ old('name', $user->name) }}"
                       class="w-full bg-black border border-neutral-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-yellow-500">
                @error('name') <p class="text-red-400 text-sm mt-2">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm text-neutral-400 mb-2">Email</label>
                <input name="email" type="email" value="{{ old('email', $user->email) }}"
                       class="w-full bg-black border border-neutral-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-yellow-500">
                @error('email') <p class="text-red-400 text-sm mt-2">{{ $message }}</p> @enderror
            </div>

            <label class="flex items-center gap-3">
                <input type="checkbox" name="is_admin" value="1" {{ old('is_admin', $user->is_admin) ? 'checked' : '' }}
                class="h-5 w-5 rounded border-neutral-600 bg-black text-yellow-500">
                <span class="text-neutral-300">Admin</span>
            </label>

            <button class="bg-yellow-500 text-black px-6 py-3 rounded-lg font-semibold hover:bg-yellow-400 transition">
                Update
            </button>
        </form>

        {{-- UPDATE PASSWORD --}}
        <form action="{{ route('admin.users.password', $user) }}" method="POST"
              class="bg-neutral-900/40 border border-neutral-800 rounded-2xl p-8 space-y-6">
            @csrf
            @method('PATCH')

            <h2 class="text-xl font-semibold">Reset Password</h2>
            <p class="text-sm text-neutral-400">Set a new password for this user.</p>

            <div>
                <label class="block text-sm text-neutral-400 mb-2">New Password</label>
                <input name="password" type="password"
                       class="w-full bg-black border border-neutral-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-yellow-500">
                @error('password') <p class="text-red-400 text-sm mt-2">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm text-neutral-400 mb-2">Confirm Password</label>
                <input name="password_confirmation" type="password"
                       class="w-full bg-black border border-neutral-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-yellow-500">
            </div>

            <button class="border border-yellow-500 text-yellow-400 px-6 py-3 rounded-lg font-semibold hover:bg-yellow-500 hover:text-black transition">
                Update Password
            </button>
        </form>

    </div>
@endsection
