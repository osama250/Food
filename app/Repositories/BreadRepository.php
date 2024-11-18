<?php

namespace App\Repositories;

use App\Models\Bread;
use App\Repositories\BaseRepository;

class BreadRepository extends BaseRepository
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
        return Bread::class;
    }
}
