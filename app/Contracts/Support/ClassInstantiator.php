<?php

declare(strict_types=1);

namespace App\Contracts\Support;

interface ClassInstantiator
{
    public function instantiate(string $abstract, array $parameters = []);
}
