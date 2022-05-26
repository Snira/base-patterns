<?php

declare(strict_types=1);

namespace App\Support;

use App\Contracts\Support\ClassInstantiator as ClassInstantiatorContract;
use Illuminate\Contracts\Container\Container;

final class ClassInstantiator implements ClassInstantiatorContract
{
    public function __construct(private Container $container)
    {
    }

    public function instantiate(string $abstract, array $parameters = [])
    {
        return $this->container->make($abstract, $parameters);
    }
}
