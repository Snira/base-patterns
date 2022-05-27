<?php

declare(strict_types=1);

namespace App\Contracts\Factories;

use App\Http\Requests\Recipe\CreateRecipeRequest;
use App\Models\Recipe;
use Illuminate\Database\Eloquent\Model;

interface RecipeFactory extends ModelFactory
{
    /**
     * @return Recipe&Model
     */
    public function createForRequest(CreateRecipeRequest $request): Recipe;
}
