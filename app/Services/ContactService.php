<?php

namespace App\Services;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\Contact;

class ContactService
{
    protected Contact $model;

    public function __construct(Contact $model)
    {
        $this->model = $model;
    }

    /**
     * Ambil daftar contact dengan pagination
     */
    public function list(int $perPage = 15): LengthAwarePaginator
    {
        return $this->model->paginate($perPage);
    }

    /**
     * Ambil contact berdasarkan ID
     */
    public function get(int $id): ?Contact
    {
        return $this->model->find($id);
    }

    /**
     * Simpan contact baru
     */
    public function store(array $data): Contact
    {
        // Bisa tambah logika bisnis sebelum create
        return $this->model->create($data);
    }

    /**
     * Update contact berdasarkan ID
     */
    public function update(int $id, array $data): bool
    {
        $contact = $this->model->findOrFail($id);
        return $contact->update($data);
    }

    /**
     * Hapus contact berdasarkan ID
     */
    public function destroy(int $id): bool
    {
        $contact = $this->model->findOrFail($id);
        return (bool) $contact->delete();
    }
}
