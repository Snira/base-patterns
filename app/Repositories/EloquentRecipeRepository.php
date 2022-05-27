<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\Repositories\RecipeRepository;
use App\Models\Recipe;

final class EloquentRecipeRepository extends AbstractModelRepository implements RecipeRepository
{
    protected static string $modelClass = Recipe::class;
}
