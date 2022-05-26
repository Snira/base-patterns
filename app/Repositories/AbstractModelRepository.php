<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Contracts\Container\Container;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use LogicException;
use RuntimeException;

abstract class AbstractModelRepository
{
    protected static string $modelClass;
    private Model $modelQueryInitiator;

    public function __construct(private Container $container)
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

    private function query(): Builder
    {
        return $this->modelQueryInitiator->newQuery();
    }

    private function setModelQueryInitiator(): void
    {
        if (!static::$modelClass || !class_exists(static::$modelClass)) {
            throw new LogicException('static::$modelClass is expected to contain an existing model class name');
        }

        $this->modelQueryInitiator = $this->container->make(static::$modelClass);
    }
}
