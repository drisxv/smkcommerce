<?php

namespace App\Services;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\Partnership;

class PartnershipService
{
    protected Partnership $model;

    public function __construct(Partnership $model)
    {
        $this->model = $model;
    }

    /**
     * Ambil daftar partnership dengan pagination
     */
    public function list(int $perPage = 15): LengthAwarePaginator
    {
        return $this->model->paginate($perPage);
    }

    /**
     * Ambil partnership berdasarkan ID
     */
    public function get(int $id): ?Partnership
    {
        return $this->model->find($id);
    }

    /**
     * Simpan partnership baru
     */
    public function store(array $data): Partnership
    {
        // bisa tambah logika bisnis sebelum create partnership
        return $this->model->create($data);
    }

    /**
     * Update partnership berdasarkan ID
     */
    public function update(int $id, array $data): bool
    {
        $partnership = $this->model->findOrFail($id);
        return $partnership->update($data);
    }

    /**
     * Hapus partnership berdasarkan ID
     */
    public function destroy(int $id): bool
    {
        $partnership = $this->model->findOrFail($id);
        return (bool) $partnership->delete();
    }
}
