<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class EloquentUserRepository implements UserRepositoryInterface
{
    protected User $model;

    public function __construct(User $model)
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

    public function find(int $id): ?User
    {
        return $this->model->find($id);
    }

    public function create(array $data): User
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data): bool
    {
        $user = $this->model->findOrFail($id);
        return $user->update($data);
    }

    public function delete(int $id): bool
    {
        $user = $this->model->findOrFail($id);
        return (bool) $user->delete();
    }
}
