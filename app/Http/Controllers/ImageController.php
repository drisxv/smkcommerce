<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImageLink;

class ImageController extends Controller
{
    public function create()
    {
        return view('upload-form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = $request->file('gambar')->store('images', 'public');

        $imageLink = new ImageLink();
        $imageLink->url = 'storage/' . $path;
        $imageLink->save();

        return back()->with('success', 'Gambar berhasil diunggah!');
    }
}
