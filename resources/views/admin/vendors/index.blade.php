@extends('layouts.admin')

@section('content')
    <div class="max-w-7xl mx-auto py-6">
        <h1 class="text-2xl font-bold mb-6">Daftar Vendor</h1>

        <div class="mb-4">
            <a href="{{ route('admin.vendors.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md shadow">
                + Tambah Vendor
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
                        <th class="px-6 py-3 border-b">Judul</th>
                        <th class="px-6 py-3 border-b">Deskripsi</th>
                        <th class="px-6 py-3 border-b">Website</th>
                        <th class="px-6 py-3 border-b">Logo</th>
                        <th class="px-6 py-3 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($vendors as $vendor)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-3 border-b">{{ $vendor->id }}</td>
                            <td class="px-6 py-3 border-b">{{ $vendor->title }}</td>
                            <td class="px-6 py-3 border-b">{{ \Illuminate\Support\Str::limit($vendor->description, 50) }}
                            </td>
                            <td class="px-6 py-3 border-b">
                                @if ($vendor->visit_website_url)
                                    <a href="{{ $vendor->visit_website_url }}" target="_blank"
                                        class="text-blue-600 underline">
                                        Kunjungi
                                    </a>
                                @endif
                            </td>
                            <td class="px-6 py-3 border-b">
                                <img src="{{ $vendor->imageLink?->url }}" alt="{{ $vendor->title }}">
                            </td>
                            <td class="px-6 py-3 border-b">
                                <div class="flex gap-2">
                                    <a href="{{ route('admin.vendors.edit', $vendor->id) }}"
                                        class="px-3 py-1 text-sm bg-blue-600 hover:bg-blue-700 text-white rounded">Edit</a>
                                    <form action="{{ route('admin.vendors.destroy', $vendor->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus vendor ini?');">
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
                            <td colspan="6" class="px-6 py-3 text-center text-gray-500">Belum ada vendor.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $vendors->links() }}
        </div>
    </div>
@endsection
