<?php

namespace App\Services;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\Information;

class InformationService
{
    protected Information $model;

    public function __construct(Information $model)
    {
        $this->model = $model;
    }

    /**
     * Ambil daftar informasi dengan pagination
     */
    public function list(int $perPage = 15): LengthAwarePaginator
    {
        return $this->model->paginate($perPage);
    }

    /**
     * Ambil informasi berdasarkan ID
     */
    public function get(int $id): ?Information
    {
        return $this->model->find($id);
    }

    /**
     * Simpan informasi baru
     */
    public function store(array $data): Information
    {
        // Bisa tambah logika bisnis sebelum create
        return $this->model->create($data);
    }

    /**
     * Update informasi berdasarkan ID
     */
    public function update(int $id, array $data): bool
    {
        $information = $this->model->findOrFail($id);
        return $information->update($data);
    }

    /**
     * Hapus informasi berdasarkan ID
     */
    public function destroy(int $id): bool
    {
        $information = $this->model->findOrFail($id);
        return (bool) $information->delete();
    }
}
