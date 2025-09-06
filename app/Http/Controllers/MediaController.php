<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ImageLink;

class MediaController extends Controller
{
    public function index()
    {
        $images = ImageLink::all();
        return response()->json($images);
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|image|max:2048',
        ]);

        $path = $request->file('file')->store('images', 'public');
        $image = ImageLink::create(['url' => 'storage/' . $path]);

        return response()->json($image, 201);
    }

    public function destroy(ImageLink $imageLink)
    {
        Storage::disk('public')->delete(str_replace('storage/', '', $imageLink->url));

        $imageLink->delete();

        return response()->json(['message' => 'Gambar berhasil dihapus.'], 200);
    }
}
