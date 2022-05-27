<?php

declare(strict_types=1);

namespace App\Factories;

use App\Contracts\Factories\RecipeFactory as RecipeFactoryContract;
use App\Http\Requests\Recipe\CreateRecipeRequest;
use App\Models\Recipe;
use Illuminate\Database\Eloquent\Model;

final class RecipeFactory extends AbstractModelFactory implements RecipeFactoryContract
{
    protected static string $modelClass = Recipe::class;

    /**
     * @return Recipe&Model
     */
    public function createForRequest(CreateRecipeRequest $request): Recipe
    {
        $recipe = $this->getModel();
        $recipe->title = $request->get('title');
        $recipe->description = $request->get('description');
        $recipe->how_to_cook = $request->get('how_to_cook');
        $recipe->active = $request->get('active');

        return $recipe;
    }
}
