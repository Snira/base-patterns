<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\PaginatedApiRequest;
use Illuminate\Http\JsonResponse;

final class RecipeController extends AbstractResourceController
{
    public function index(PaginatedApiRequest $request): JsonResponse
    {

    }

    public function create(): JsonResponse
    {

    }
}
