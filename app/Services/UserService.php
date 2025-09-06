<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\User;

class UserService
{
    protected UserRepositoryInterface $repo;

    public function __construct(UserRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function list(int $perPage = 15): LengthAwarePaginator
    {
        return $this->repo->paginate($perPage);
    }

    public function get(int $id): ?User
    {
        return $this->repo->find($id);
    }

    public function store(array $data): User
    {
        // bisa tambah logika bisnis sebelum create user
        return $this->repo->create($data);
    }

    public function update(int $id, array $data): bool
    {
        return $this->repo->update($id, $data);
    }

    public function destroy(int $id): bool
    {
        return $this->repo->delete($id);
    }
}
