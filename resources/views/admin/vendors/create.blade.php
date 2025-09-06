@extends('layouts.admin')

@section('content')
    <div class="max-w-3xl mx-auto py-6">
        <h1 class="text-2xl font-bold mb-6">Tambah Vendor</h1>

        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 border border-red-300 text-red-700 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.vendors.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-white shadow rounded-lg p-6 space-y-4">
            @csrf

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
                <input type="text" name="title" id="title"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    value="{{ old('title') }}" required>
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="description" id="description" rows="3"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('description') }}</textarea>
            </div>

            <div>
                <label for="visit_website_url" class="block text-sm font-medium text-gray-700">URL Website</label>
                <input type="url" name="visit_website_url" id="visit_website_url"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    value="{{ old('visit_website_url') }}">
            </div>

            <div>
                <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar</label>
                <input type="file" name="gambar" id="gambar"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.vendors.index') }}"
                    class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-md">Batal</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md shadow">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection
