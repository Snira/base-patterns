<?php

declare(strict_types=1);

namespace App\Contracts\Factories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

interface ResourceFactory
{
    public function createForModel(Model $model, string $resourceClass): JsonResource;

    /**
     * @param Collection<Model>
     */
    public function createForModelCollection(Collection $models, string $resourceCollectionClass): JsonResource;
}
