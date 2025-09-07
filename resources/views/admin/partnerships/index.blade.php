@extends('layouts.admin')

@section('content')
    <div class="max-w-7xl mx-auto py-6">
        <h1 class="text-2xl font-bold mb-6">Daftar Partnership</h1>

        <div class="mb-4">
            <a href="{{ route('admin.partnerships.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md shadow">
                + Tambah Partnership
            </a>
        </div>

        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 border border-green-300 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-left">
                        <th class="px-6 py-3 border-b">ID</th>
                        <th class="px-6 py-3 border-b">Title</th>
                        <th class="px-6 py-3 border-b">URL Partner</th>
                        <th class="px-6 py-3 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($partnerships as $partnership)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-3 border-b">{{ $partnership->id }}</td>
                            <td class="px-6 py-3 border-b">{{ $partnership->title }}</td>
                            <td class="px-6 py-3 border-b">
                                <a href="{{ $partnership->partner_url }}" target="_blank"
                                    class="text-blue-600 hover:underline">
                                    {{ $partnership->partner_url }}
                                </a>
                            </td>
                            <td class="px-6 py-3 border-b">
                                <div class="flex gap-2">
                                    <a href="{{ route('admin.partnerships.edit', $partnership->id) }}"
                                        class="px-3 py-1 text-sm bg-blue-600 hover:bg-blue-700 text-white rounded">Edit</a>

                                    <form action="{{ route('admin.partnerships.destroy', $partnership->id) }}"
                                        method="POST" onsubmit="return confirm('Yakin ingin menghapus partnership ini?');">
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
                            <td colspan="4" class="px-6 py-3 text-center text-gray-500">Belum ada partnership.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $partnerships->links() }}
        </div>
    </div>
@endsection
