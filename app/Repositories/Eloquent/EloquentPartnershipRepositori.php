<?php

namespace App\Repositories\Eloquent;

use App\Models\Partnership;
use App\Repositories\Contracts\PartnershipRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class EloquentPartnershipRepository implements PartnershipRepositoryInterface
{
    protected Partnership $model;

    public function __construct(Partnership $model)
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

    public function find(int $id): ?Partnership
    {
        return $this->model->find($id);
    }

    public function create(array $data): Partnership
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data): bool
    {
        $partnership = $this->model->findOrFail($id);
        return $partnership->update($data);
    }

    public function delete(int $id): bool
    {
        $partnership = $this->model->findOrFail($id);
        return (bool) $partnership->delete();
    }
}
