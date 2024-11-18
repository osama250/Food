<?php

namespace App\Repositories;

use App\Models\Excursion;
use App\Repositories\BaseRepository;

class ExcursionRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'title',
        'description',
        'location',
        'image'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Excursion::class;
    }
}
