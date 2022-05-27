<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Factory as ValidationFactory;
use Illuminate\Contracts\Validation\ValidatesWhenResolved;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidatesWhenResolvedTrait;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class ApiRequest extends Request implements ValidatesWhenResolved
{
    use ValidatesWhenResolvedTrait;

    protected int $defaultPerPage = 10;
    protected int $defaultPage = 1;

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
        return [
            'perPage' => 'bail|sometimes|integer|min:1|max:250',
            'page' => 'bail|sometimes|integer|min:1',
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new BadRequestException();
    }

    protected function messages(): array
    {
        return [];
    }

    protected function attributes(): array
    {
        return [];
    }

    public function getPerPage(): int
    {
        return (int)$this->get('perPage', $this->defaultPerPage);
    }

    public function getPage(): int
    {
        return (int)$this->get('page', $this->defaultPage);
    }
}
