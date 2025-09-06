<?php

namespace App\Repositories\Eloquent;

use App\Models\Vendor;
use App\Repositories\Contracts\VendorRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;



class VendorRepository implements VendorRepositoryInterface
{
    protected Vendor $model;

    public function __construct(Vendor $model)
    {
        $this->model = $model;
    }

    public function all(): array
    {
        return $this->model->all()->toArray();
    }

    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return $this->model->paginate($perPage);
    }

    public function find(int $id): ?Vendor
    {
        return $this->model->find($id);
    }

    public function create(array $data): Vendor
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data): bool
    {
        $vendor = $this->model->findOrFail($id);
        return $vendor->update($data);
    }

    public function delete(int $id): bool
    {
        $vendor = $this->model->findOrFail($id);
        return (bool) $vendor->delete();
    }
}
