<?php

declare(strict_types=1);

namespace App\Factories;

use App\Contracts\Support\ClassInstantiator;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractModelFactory
{
    protected static string $modelClass;

    public function __construct(private ClassInstantiator $instantiator)
    {
    }

    public function create(): Model
    {
        return $this->instantiate();
    }

    private function instantiate(): Model
    {
        return $this->instantiator->instantiate(static::$modelClass);
    }
}
