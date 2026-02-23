@extends('admin.layout')

@section('content')
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">        <div>
            <h1 class="text-3xl font-semibold">Users</h1>
            <p class="text-neutral-400 text-sm mt-1">Manage admins and staff accounts.</p>
        </div>

        <a href="{{ route('admin.users.create') }}"
           class="bg-yellow-500 text-black px-5 py-2 rounded-lg font-semibold hover:bg-yellow-400 transition">
            + Add User
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 bg-green-500/10 border border-green-500/20 text-green-300 px-4 py-3 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 bg-red-500/10 border border-red-500/20 text-red-300 px-4 py-3 rounded-lg">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-neutral-900/40 border border-neutral-800 rounded-2xl overflow-hidden hidden lg:block">
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-neutral-900">
                <tr class="text-left text-neutral-400 uppercase tracking-wider text-xs">
                    <th class="px-6 py-4">Name</th>
                    <th class="px-6 py-4">Email</th>
                    <th class="px-6 py-4">Role</th>
                    <th class="px-6 py-4">Created</th>
                    <th class="px-6 py-4 text-right">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($users as $u)
                    <tr class="border-t border-neutral-800">
                        <td class="px-6 py-4 text-white">{{ $u->name }}</td>
                        <td class="px-6 py-4 text-neutral-300">{{ $u->email }}</td>
                        <td class="px-6 py-4">
                            @if($u->is_admin)
                                <span class="inline-flex px-2 py-1 rounded bg-yellow-500/10 text-yellow-400 border border-yellow-500/20 text-xs">
                                Admin
                            </span>
                            @else
                                <span class="inline-flex px-2 py-1 rounded bg-neutral-800 text-neutral-300 text-xs">
                                User
                            </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-neutral-400">{{ $u->created_at?->format('d M Y') }}</td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="{{ route('admin.users.edit', $u) }}"
                               class="px-3 py-2 rounded-lg border border-neutral-700 hover:border-yellow-500 hover:text-yellow-400 transition">
                                Edit
                            </a>

                            <form action="{{ route('admin.users.destroy', $u) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button class="px-3 py-2 rounded-lg border border-red-500/30 text-red-300 hover:bg-red-500/10 transition"
                                        onclick="return confirm('Delete this user?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-10 text-center text-neutral-400">
                            No users found.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-neutral-800">
            {{ $users->links() }}
        </div>
    </div>
    {{-- MOBILE CARDS --}}
    <div class="lg:hidden space-y-4">

        @forelse($users as $u)

            <div class="bg-neutral-900 border border-neutral-800 rounded-xl p-4">

                <div class="text-white font-semibold text-lg">
                    {{ $u->name }}
                </div>

                <div class="text-neutral-400 text-sm">
                    {{ $u->email }}
                </div>

                <div class="mt-2">

                    @if($u->is_admin)
                        <span class="px-2 py-1 rounded bg-yellow-500/10 text-yellow-400 border border-yellow-500/20 text-xs">
                        Admin
                    </span>
                    @else
                        <span class="px-2 py-1 rounded bg-neutral-800 text-neutral-300 text-xs">
                        User
                    </span>
                    @endif

                </div>

                <div class="text-neutral-500 text-sm mt-2">
                    Created: {{ $u->created_at?->format('d M Y') }}
                </div>


                <div class="flex gap-3 mt-4">

                    <a href="{{ route('admin.users.edit', $u) }}"
                       class="flex-1 text-center bg-blue-500 py-2 rounded hover:bg-blue-600 transition">
                        Edit
                    </a>

                    <form action="{{ route('admin.users.destroy', $u) }}"
                          method="POST"
                          class="flex-1">

                        @csrf
                        @method('DELETE')

                        <button class="w-full bg-red-500 py-2 rounded hover:bg-red-600 transition">
                            Delete
                        </button>

                    </form>

                </div>

            </div>

        @empty

            <div class="text-neutral-400 text-center py-10">
                No users found.
            </div>

        @endforelse

    </div>
@endsection
