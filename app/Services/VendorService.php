<?php

namespace App\Services;

use App\Models\Vendor;
use App\Models\ImageLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VendorService
{
    protected ImageUploadService $imageUploadService;

    public function __construct(ImageUploadService $imageUploadService)
    {
        $this->imageUploadService = $imageUploadService;
    }

    /**
     * Ambil semua vendor atau paginate
     */
    public function list(int $perPage = 15)
    {
        return Vendor::with('imageLink')->paginate($perPage);
    }

    /**
     * Buat vendor baru dan unggah gambar.
     */
    public function createVendor(Request $request): Vendor
    {
        // upload gambar kalau ada
        $imageLink = null;
        if ($request->hasFile('gambar')) {
            $imageLink = $this->imageUploadService->uploadImage($request, 'vendors');
        }

        return Vendor::create([
            'title'             => $request->input('title'),
            'description'       => $request->input('description'),
            'visit_website_url' => $request->input('visit_website_url'),
            'image_link_id'     => $imageLink?->id,
        ]);
    }

    /**
     * Perbarui vendor yang ada dan kelola gambar baru (jika ada).
     */
    public function updateVendor(Request $request, Vendor $vendor): Vendor
    {
        $vendor->fill($request->only('title', 'description', 'visit_website_url'));

        // kalau ada gambar baru, upload dan hapus yang lama
        if ($request->hasFile('gambar')) {
            // hapus file lama kalau ada
            if ($vendor->imageLink) {
                // hapus file di storage
                Storage::disk('public')->delete(
                    str_replace('/storage/', '', $vendor->imageLink->url)
                );
                // hapus record image link lama
                $vendor->imageLink->delete();
            }

            $imageLink = $this->imageUploadService->uploadImage($request, 'vendors');
            $vendor->image_link_id = $imageLink->id;
        }

        $vendor->save();

        return $vendor;
    }

    /**
     * Hapus vendor dan gambar yang terkait.
     */
    public function deleteVendor(Vendor $vendor): bool
    {
        if ($vendor->imageLink) {
            Storage::disk('public')->delete(
                str_replace('/storage/', '', $vendor->imageLink->url)
            );
            $vendor->imageLink->delete();
        }

        return $vendor->delete();
    }

    /**
     * Cari vendor berdasarkan ID.
     */
    public function find(int $id): ?Vendor
    {
        return Vendor::with('imageLink')->find($id);
    }
}
