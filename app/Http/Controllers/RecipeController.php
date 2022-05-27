<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Contracts\Factories\RecipeFactory;
use App\Contracts\Factories\ResourceFactory;
use App\Contracts\Repositories\RecipeRepository;
use App\Http\Requests\PaginatedApiRequest;
use App\Http\Requests\Recipe\CreateRecipeRequest;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;

final class RecipeController extends AbstractResourceController
{
    public function __construct(
        ResponseFactory $responseFactory,
        private RecipeFactory $recipeFactory,
        private RecipeRepository $recipeRepository,
        private ResourceFactory $resourceFactory,
    ) {
        parent::__construct($responseFactory);
    }

    public function index(PaginatedApiRequest $request): JsonResponse
    {
        $recipes = $this->recipeRepository->all();
        $resourceCollection = $this->resourceFactory->createForModelCollection($recipes);

        return $resourceCollection->toResponse($request);
    }

    public function create(CreateRecipeRequest $request): JsonResponse
    {

    }
}
