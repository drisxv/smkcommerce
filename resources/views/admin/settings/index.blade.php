@extends('layouts.admin')

@section('content')
    <div class="max-w-7xl mx-auto py-6">
        <h1 class="text-2xl font-bold mb-6">Settings</h1>

        <div class="max-w-7xl mx-auto py-6">
            <h1 class="text-2xl font-bold mb-6">Daftar About</h1>

            <div class="mb-4">
                <a href="{{ route('admin.abouts.create') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md shadow">
                    + Tambah About
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
                            <th class="px-6 py-3 border-b">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($abouts as $about)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-3 border-b">{{ $about->id }}</td>
                                <td class="px-6 py-3 border-b">{{ $about->title }}</td>
                                <td class="px-6 py-3 border-b flex gap-2">
                                    <a href="{{ route('admin.abouts.edit', $about->id) }}"
                                        class="px-3 py-1 text-sm bg-blue-600 hover:bg-blue-700 text-white rounded">Edit</a>
                                    <form action="{{ route('admin.abouts.destroy', $about->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 text-sm bg-red-600 hover:bg-red-700 text-white rounded">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-3 text-center text-gray-500">Belum ada About.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $abouts->links() }}
            </div>
        </div>

        <h2 class="border-t-2 text-xl font-bold mb-4">Footer</h2>

        {{-- INFORMATIONS --}}
        <div class="mb-10">
            <h2 class="text-xl font-semibold mb-4">Informations</h2>

            <a href="{{ route('admin.informations.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md shadow mb-2 inline-block">
                + Tambah Information
            </a>

            <div class="overflow-x-auto bg-white rounded-lg shadow mt-2">
                <table class="min-w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-100 text-left">
                            <th class="px-6 py-3 border-b">ID</th>
                            <th class="px-6 py-3 border-b">Title</th>
                            <th class="px-6 py-3 border-b">Content</th>
                            <th class="px-6 py-3 border-b">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($informations as $info)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-3 border-b">{{ $info->id }}</td>
                                <td class="px-6 py-3 border-b">{{ $info->title }}</td>
                                <td class="px-6 py-3 border-b">{{ Str::limit($info->content, 50) }}</td>
                                <td class="px-6 py-3 border-b">
                                    <div class="flex gap-2">
                                        <a href="{{ route('admin.informations.edit', $info->id) }}"
                                            class="px-3 py-1 text-sm bg-blue-600 hover:bg-blue-700 text-white rounded">Edit</a>

                                        <form action="{{ route('admin.informations.destroy', $info->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus informasi ini?');">
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
                                <td colspan="4" class="px-6 py-3 text-center text-gray-500">Belum ada informasi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $informations->links() }}
            </div>
        </div>

        {{-- CONTACTS --}}
        <div>
            <h2 class="text-xl font-semibold mb-4">Contacts</h2>

            <a href="{{ route('admin.contacts.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md shadow mb-2 inline-block">
                + Tambah Contact
            </a>

            <div class="overflow-x-auto bg-white rounded-lg shadow mt-2">
                <table class="min-w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-100 text-left">
                            <th class="px-6 py-3 border-b">ID</th>
                            <th class="px-6 py-3 border-b">Name</th>
                            <th class="px-6 py-3 border-b">Address</th>
                            <th class="px-6 py-3 border-b">Email</th>
                            <th class="px-6 py-3 border-b">Phone</th>
                            <th class="px-6 py-3 border-b">Social Media</th>
                            <th class="px-6 py-3 border-b">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($contacts as $contact)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-3 border-b">{{ $contact->id }}</td>
                                <td class="px-6 py-3 border-b">{{ $contact->name }}</td>
                                <td class="px-6 py-3 border-b">{{ Str::limit($contact->address, 50) }}</td>
                                <td class="px-6 py-3 border-b">{{ $contact->email }}</td>
                                <td class="px-6 py-3 border-b">{{ $contact->phone_number }}</td>
                                <td class="px-6 py-3 border-b">{{ $contact->social_media }}</td>
                                <td class="px-6 py-3 border-b">
                                    <div class="flex gap-2">
                                        <a href="{{ route('admin.contacts.edit', $contact->id) }}"
                                            class="px-3 py-1 text-sm bg-blue-600 hover:bg-blue-700 text-white rounded">Edit</a>

                                        <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus contact ini?');">
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
                                <td colspan="7" class="px-6 py-3 text-center text-gray-500">Belum ada contact.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $contacts->links() }}
            </div>
        </div>
    </div>
@endsection
