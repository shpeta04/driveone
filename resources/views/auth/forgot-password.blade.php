<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DriveOne Forgot Password</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-black flex items-center justify-center min-h-screen">

<div class="w-full max-w-md bg-neutral-900 border border-neutral-800 rounded-xl p-8 shadow-2xl">

    {{-- TITLE --}}
    <div class="text-center mb-6">

        <h1 class="text-3xl font-bold tracking-widest">
            DRIVE<span class="text-yellow-500">ONE</span>
        </h1>

        <p class="text-neutral-400 text-sm mt-2">
            Reset your password
        </p>

    </div>


    {{-- DESCRIPTION --}}
    <div class="text-neutral-400 text-sm mb-6 text-center">
        Enter your email and we’ll send you a reset link.
    </div>


    {{-- SUCCESS MESSAGE --}}
    @if (session('status'))
        <div class="mb-4 text-green-400 text-sm text-center">
            {{ session('status') }}
        </div>
    @endif


    {{-- FORM --}}
    <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
        @csrf

        {{-- EMAIL --}}
        <div>

            <label class="block text-sm text-neutral-300 mb-1">
                Email Address
            </label>

            <input type="email"
                   name="email"
                   value="{{ old('email') }}"
                   required autofocus
                   class="w-full bg-black border border-neutral-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-yellow-500">

            @error('email')
            <div class="text-red-400 text-sm mt-1">
                {{ $message }}
            </div>
            @enderror

        </div>


        {{-- BUTTON --}}
        <button type="submit"
                class="w-full bg-yellow-500 hover:bg-yellow-600 text-black font-semibold py-2 rounded-lg transition">

            Send Reset Link

        </button>

    </form>


    {{-- BACK TO LOGIN --}}
    <div class="text-center mt-6">

        <a href="{{ route('login') }}"
           class="text-neutral-400 hover:text-yellow-500 text-sm transition">

            Back to login

        </a>

    </div>


    {{-- FOOTER --}}
    <div class="text-center text-neutral-500 text-xs mt-6">
        © {{ date('Y') }} DriveOne. All rights reserved.
    </div>

</div>

</body>
</html>
