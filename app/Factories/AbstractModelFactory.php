<?php

declare(strict_types=1);

namespace App\Factories;

use Illuminate\Contracts\Container\Container;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractModelFactory
{
    protected static string $modelClass;

    public function __construct()
    {
    }

    public function create(): Model
    {
        return $this->initiate();
    }

    private function initiate(): Model
    {
        return $this->container->make(static::$modelClass);
    }
}
