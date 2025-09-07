<?php

namespace App\Repositories\Contracts;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\Partnership;

interface PartnershipRepositoryInterface
{
    public function all(): array;
    public function paginate(int $perPage = 15): LengthAwarePaginator;
    public function find(int $id): ?Partnership;
    public function create(array $data): Partnership;
    public function update(int $id, array $data): bool;
    public function delete(int $id): bool;
}
