@extends('layouts.admin')

@section('content')
    <div class="max-w-3xl mx-auto py-6">
        <h1 class="text-2xl font-bold mb-6">Edit User</h1>

        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 border border-red-300 text-red-700 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.users.update', $user->id) }}" method="POST"
            class="bg-white shadow rounded-lg p-6 space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="name" id="name"
                    class="mt-1 block w-full h-24 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    value="{{ old('name', $user->name) }}" required>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email"
                    class="mt-1 block w-full h-24 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.users.index') }}"
                    class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-md">Batal</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md shadow">
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection
