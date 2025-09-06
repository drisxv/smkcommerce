@extends('layouts.admin') {{-- sesuaikan dengan layout kamu --}}

@section('content')
    <div class="max-w-7xl mx-auto py-6">
        <h1 class="text-2xl font-bold mb-6">Daftar User</h1>

        {{-- tombol tambah user --}}
        <div class="mb-4">
            <a href="{{ route('admin.users.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md shadow">
                + Tambah User
            </a>
        </div>

        {{-- alert sukses --}}
        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 border border-green-300 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        {{-- table --}}
        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-left">
                        <th class="px-6 py-3 border-b">ID</th>
                        <th class="px-6 py-3 border-b">Nama</th>
                        <th class="px-6 py-3 border-b">Email</th>
                        <th class="px-6 py-3 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-3 border-b">{{ $user->id }}</td>
                            <td class="px-6 py-3 border-b">{{ $user->name }}</td>
                            <td class="px-6 py-3 border-b">{{ $user->email }}</td>
                            <td class="px-6 py-3 border-b">
                                <div class="flex gap-2">
                                    <a href="{{ route('admin.users.show', $user->id) }}"
                                        class="px-3 py-1 text-sm bg-green-600 hover:bg-green-700 text-white rounded">Detail</a>

                                    <a href="{{ route('admin.users.edit', $user->id) }}"
                                        class="px-3 py-1 text-sm bg-blue-600 hover:bg-blue-700 text-white rounded">Edit</a>

                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus user ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 text-sm bg-red-600 hover:bg-red-700 text-white rounded">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-3 text-center text-gray-500">Belum ada user.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>
@endsection
