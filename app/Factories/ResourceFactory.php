<?php

declare(strict_types=1);

namespace App\Factories;

use App\Contracts\Factories\ResourceFactory as ResourceFactoryContract;
use App\Contracts\Support\ClassInstantiator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;
use InvalidArgumentException;

final class ResourceFactory implements ResourceFactoryContract
{
    public function __construct(private ClassInstantiator $instantiator)
    {
    }

    public function createForModel(Model $model, string $resourceClass): JsonResource
    {
        return $this->instantiate($model, $resourceClass);
    }

    /**
     * @param Collection<Model>
     */
    public function createForModelCollection(Collection $models, string $resourceCollectionClass = null): JsonResource
    {
        return $this->instantiate($models, $resourceCollectionClass ?? ResourceCollection::class);
    }

    private function instantiate($resource, string $resourceClass): JsonResource
    {
        if (!class_exists($resourceClass) || !is_a($resourceClass, JsonResource::class, true)) {
            throw new InvalidArgumentException(
                '$resourceClass needs to be an existing class which extends JsonResource'
            );
        }

        return $this->instantiator->instantiate($resourceClass, ['resource' => $resource]);
    }
}
