<?php

namespace App\Repositories;

use App\Models\Capine;
use App\Repositories\BaseRepository;

class CapineRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'capacity'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Capine::class;
    }
}
