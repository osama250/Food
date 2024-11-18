<?php

namespace App\Repositories;

use App\Models\Salad;
use App\Repositories\BaseRepository;

class SaladRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'image'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Salad::class;
    }
}
