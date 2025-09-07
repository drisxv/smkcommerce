@extends('layouts.admin')

@section('content')
    <div class="max-w-3xl mx-auto py-6">
        <h1 class="text-2xl font-bold mb-6">Edit Contact</h1>

        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 border border-red-300 text-red-700 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.contacts.update', $contact->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Name</label>
                <input type="text" name="name" value="{{ old('name', $contact->name) }}"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Address</label>
                <textarea name="address" rows="3"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300">{{ old('address', $contact->address) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email', $contact->email) }}"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Phone Number</label>
                <input type="text" name="phone_number" value="{{ old('phone_number', $contact->phone_number) }}"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Social Media</label>
                <input type="text" name="social_media" value="{{ old('social_media', $contact->social_media) }}"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <div class="flex gap-2">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md">Update</button>
                <a href="{{ route('admin.settings.index') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md">Batal</a>
            </div>
        </form>
    </div>
@endsection
