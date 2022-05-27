<?php

declare(strict_types=1);

namespace App\Contracts\Repositories;

use Illuminate\Database\Eloquent\Model;

interface ModelRepository
{
    public function find(int $id): ?Model;

    public function save(Model $model): void;
}
