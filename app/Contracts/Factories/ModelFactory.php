<?php

declare(strict_types=1);

namespace App\Contracts\Factories;

use Illuminate\Database\Eloquent\Model;

interface ModelFactory
{
    public function create(): Model;
}
