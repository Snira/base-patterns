<?php

namespace App\Http\Controllers;

use App\Contracts\Support\ClassInstantiator;
use App\Http\Requests\ApiRequest;
use Illuminate\Routing\Controller as BaseController;

abstract class AbstractApiController extends BaseController
{
    protected ApiRequest $request;

    public function __construct(private ClassInstantiator $instantiator)
    {
    }

    protected function setRequest(ApiRequest $request = null): void
    {
        $this->request = $this->instantiator->instantiate($request ?: ApiRequest::class);
    }
}
