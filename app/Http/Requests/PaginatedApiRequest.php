<?php

declare(strict_types=1);

namespace App\Http\Requests;

class PaginatedApiRequest extends ApiRequest
{
    protected int $defaultPerPage = 10;
    protected int $defaultPage = 1;

    protected function rules(): array
    {
        return [
            'perPage' => 'bail|sometimes|integer|min:1|max:250',
            'page' => 'bail|sometimes|integer|min:1',
        ];
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
