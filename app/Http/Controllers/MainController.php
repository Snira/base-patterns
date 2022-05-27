<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Contracts\Support\ClassInstantiator;
use App\Http\Requests\PaginatedApiRequest;

final class MainController extends AbstractResourceController
{
    public function __construct(ClassInstantiator $instantiator)
    {
        parent::__construct($instantiator);

        $this->setRequest(PaginatedApiRequest::class);
    }
}
