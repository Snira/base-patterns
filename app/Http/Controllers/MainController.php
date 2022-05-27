<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Contracts\Support\ClassInstantiator;
use App\Http\Requests\PaginatedApiRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

final class MainController extends AbstractApiController
{
    public function __construct(ClassInstantiator $instantiator)
    {
        parent::__construct($instantiator);

        $this->setRequest(PaginatedApiRequest::class);
    }

    public function index(): JsonResponse
    {
        return new JsonResponse(['page' => $this->request->getPage()], Response::HTTP_OK);
    }
}
