<?php

namespace App\Http\Controllers;

use App\Contracts\Support\ClassInstantiator;
use App\Http\Requests\ApiRequest;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

abstract class AbstractResourceController extends BaseController
{
    protected ApiRequest $request;

    public function __construct(private ClassInstantiator $instantiator, private ResponseFactory $responseFactory)
    {
    }

    protected function setRequest(string $requestClass = null): void
    {
        $this->request = $this->instantiator->instantiate($requestClass ?: ApiRequest::class);
    }

    protected function returnResponse(array $data = [], int $status = JsonResponse::HTTP_OK): JsonResponse
    {
        return $this->responseFactory->json($data, $status);
    }
}
