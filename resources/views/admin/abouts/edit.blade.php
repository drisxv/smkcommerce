@extends('layouts.admin')

@section('content')
    <div class="max-w-3xl mx-auto py-6">
        <h1 class="text-2xl font-bold mb-6">Edit About</h1>

        <form action="{{ route('admin.abouts.update', $about->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Title</label>
                <input type="text" name="title" class="w-full border rounded px-3 py-2"
                    value="{{ old('title', $about->title) }}" required>
            </div>
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Description</label>
                <textarea name="description" rows="6" class="w-full border rounded px-3 py-2" required>{{ old('description', $about->description) }}</textarea>
            </div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Update</button>
        </form>
    </div>
@endsection
