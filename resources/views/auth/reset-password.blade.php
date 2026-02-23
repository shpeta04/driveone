<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DriveOne Reset Password</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-black flex items-center justify-center min-h-screen">

<div class="w-full max-w-md bg-neutral-900 border border-neutral-800 rounded-xl p-8 shadow-2xl">

    {{-- TITLE --}}
    <div class="text-center mb-8">

        <h1 class="text-3xl font-bold tracking-widest">
            DRIVE<span class="text-yellow-500">ONE</span>
        </h1>

        <p class="text-neutral-400 text-sm mt-2">
            Reset your password
        </p>

    </div>


    {{-- FORM --}}
    <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">


        {{-- EMAIL --}}
        <div>
            <label class="block text-sm text-neutral-300 mb-1">
                Email
            </label>

            <input type="email"
                   name="email"
                   value="{{ old('email', $request->email) }}"
                   required autofocus
                   class="w-full bg-black border border-neutral-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-yellow-500">

            @error('email')
            <div class="text-red-400 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>


        {{-- PASSWORD --}}
        <div>
            <label class="block text-sm text-neutral-300 mb-1">
                New Password
            </label>

            <input type="password"
                   name="password"
                   required
                   class="w-full bg-black border border-neutral-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-yellow-500">

            @error('password')
            <div class="text-red-400 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>


        {{-- CONFIRM PASSWORD --}}
        <div>
            <label class="block text-sm text-neutral-300 mb-1">
                Confirm Password
            </label>

            <input type="password"
                   name="password_confirmation"
                   required
                   class="w-full bg-black border border-neutral-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-yellow-500">

            @error('password_confirmation')
            <div class="text-red-400 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>


        {{-- BUTTON --}}
        <button type="submit"
                class="w-full bg-yellow-500 hover:bg-yellow-600 text-black font-semibold py-2 rounded-lg transition">
            Reset Password
        </button>

    </form>


    {{-- FOOTER --}}
    <div class="text-center text-neutral-500 text-xs mt-6">
        © {{ date('Y') }} DriveOne. All rights reserved.
    </div>

</div>

</body>
</html>
