<?php

namespace App\Repositories\Contracts;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\User;

interface UserRepositoryInterface
{
    public function all(): array;
    public function paginate(int $perPage = 15): LengthAwarePaginator;
    public function find(int $id): ?User;
    public function create(array $data): User;
    public function update(int $id, array $data): bool;
    public function delete(int $id): bool;
}
