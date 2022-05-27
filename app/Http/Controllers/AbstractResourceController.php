<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

abstract class AbstractResourceController extends BaseController
{
    public function __construct(private ResponseFactory $responseFactory)
    {
    }

    protected function returnResponse(array $data = [], int $status = JsonResponse::HTTP_OK): JsonResponse
    {
        return $this->responseFactory->json($data, $status);
    }
}
