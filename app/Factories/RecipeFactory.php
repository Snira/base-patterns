<?php

declare(strict_types=1);

namespace App\Factories;

use App\Contracts\Factories\RecipeFactory as RecipeFactoryContract;
use App\Models\Recipe;

final class RecipeFactory extends AbstractModelFactory implements RecipeFactoryContract
{
    protected static string $modelClass = Recipe::class;
}
