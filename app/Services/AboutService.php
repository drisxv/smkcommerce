<?php

namespace App\Services;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\About;

class AboutService
{
    protected About $model;

    public function __construct(About $model)
    {
        $this->model = $model;
    }

    /**
     * Ambil daftar About dengan pagination
     */
    public function list(int $perPage = 15): LengthAwarePaginator
    {
        return $this->model->paginate($perPage);
    }

    /**
     * Ambil About berdasarkan ID
     */
    public function get(int $id): ?About
    {
        return $this->model->find($id);
    }

    /**
     * Simpan About baru
     */
    public function store(array $data): About
    {
        // Cek apakah sudah ada data About
        $existing = $this->model->first();

        if ($existing) {
            // Update data yang sudah ada
            $existing->update($data);
            return $existing;
        }

        // Kalau belum ada, buat baru
        return $this->model->create($data);
    }


    /**
     * Update About berdasarkan ID
     */
    public function update(int $id, array $data): bool
    {
        $about = $this->model->findOrFail($id);
        return $about->update($data);
    }

    /**
     * Hapus About berdasarkan ID
     */
    public function destroy(int $id): bool
    {
        $about = $this->model->findOrFail($id);
        return (bool) $about->delete();
    }
}
