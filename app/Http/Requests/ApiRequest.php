<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Factory as ValidationFactory;
use Illuminate\Contracts\Validation\ValidatesWhenResolved;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidatesWhenResolvedTrait;

class ApiRequest extends Request implements ValidatesWhenResolved
{
    use ValidatesWhenResolvedTrait;

    public function __construct(
        private ValidationFactory $validator,
        array $query = [],
        array $request = [],
        array $attributes = [],
        array $cookies = [],
        array $files = [],
        array $server = [],
        $content = null,
    ) {
        parent::__construct($query, $request, $attributes, $cookies, $files, $server, $content);
    }

    protected function getValidatorInstance(): Validator
    {
        return $this->validator->make(
            $this->all(),
            $this->rules(),
            $this->messages(),
            $this->attributes(),
        );
    }

    protected function rules(): array
    {
        return [];
    }

    protected function messages(): array
    {
        return [];
    }

    protected function attributes(): array
    {
        return [];
    }
}
