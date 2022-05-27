<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\Repositories\ModelRepository;
use App\Contracts\Support\ClassInstantiator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use LogicException;
use RuntimeException;

abstract class AbstractModelRepository implements ModelRepository
{
    protected static string $modelClass;
    private Model $modelQueryInitiator;

    public function __construct(private ClassInstantiator $instantiator)
    {
        $this->setModelQueryInitiator();
    }

    public function find(int $id): ?Model
    {
        return $this->query()->find($id);
    }

    public function save(Model $model): void
    {
        if ($model->save() === false) {
            throw new RuntimeException('Save failed');
        }
    }

    /**
     * @return Collection<Model>
     */
    public function all(): Collection
    {
        return $this->query()->get();
    }

    private function query(): Builder
    {
        return $this->modelQueryInitiator->newQuery();
    }

    private function setModelQueryInitiator(): void
    {
        if (!static::$modelClass || !class_exists(static::$modelClass)) {
            throw new LogicException('static::$modelClass is expected to contain an existing model class name');
        }

        $this->modelQueryInitiator = $this->instantiator->instantiate(static::$modelClass);
    }
}
