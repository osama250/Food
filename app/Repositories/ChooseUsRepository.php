<?php

namespace App\Repositories;

use App\Models\ChooseUs;
use App\Repositories\BaseRepository;

class ChooseUsRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'icon',
        'title',
        'text'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return ChooseUs::class;
    }
}
