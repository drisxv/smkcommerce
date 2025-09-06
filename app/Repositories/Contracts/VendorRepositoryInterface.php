<?php

namespace App\Repositories\Contracts;

use App\Models\Vendor;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;


interface VendorRepositoryInterface
{
    public function all(): array;
    public function paginate(int $perPage = 15): LengthAwarePaginator;
    public function find(int $id): ?Vendor;
    public function create(array $data): Vendor;
    public function update(int $id, array $data): bool;
    public function delete(int $id): bool;
}
