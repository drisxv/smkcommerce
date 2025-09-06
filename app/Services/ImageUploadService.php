<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\ImageLink;
use Illuminate\Support\Facades\Storage;

class ImageUploadService
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $folder
     * @return \App\Models\ImageLink
     */

    public function uploadImage(Request $request, $folder = 'images')
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = $request->file('gambar');
        $path = $image->store($folder, 'public');

        return ImageLink::create([
            'url' => Storage::url($path),
        ]);
    }
}
