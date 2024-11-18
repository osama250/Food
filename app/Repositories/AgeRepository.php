<?php

namespace App\Repositories;

use App\Models\Age;
use App\Repositories\BaseRepository;

class AgeRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'from',
        'to',
        'type'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Age::class;
    }
}
