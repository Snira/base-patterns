<?php

declare(strict_types=1);

namespace App\Http\Requests\Recipe;

use App\Http\Requests\ApiRequest;

final class CreateRecipeRequest extends ApiRequest
{
    protected function rules(): array
    {
        return array_merge(
            parent::rules(),
            [
                'title' => 'bail|required|string|max:50',
                'description' => 'bail|required|string|max:250',
                'how_to_cook' => 'bail|required|string',
                'active' => 'bail|required|bool'
            ],
        );
    }
}
