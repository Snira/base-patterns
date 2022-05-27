<?php

namespace App\Http\Controllers;

use App\Contracts\Support\ClassInstantiator;
use App\Http\Requests\ApiRequest;
use Illuminate\Routing\Controller as BaseController;

abstract class AbstractResourceController extends BaseController
{
    protected ApiRequest $request;

    public function __construct(private ClassInstantiator $instantiator)
    {
    }

    protected function setRequest(string $requestClass = null): void
    {
        $this->request = $this->instantiator->instantiate($requestClass ?: ApiRequest::class);
    }
}
