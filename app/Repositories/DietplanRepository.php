<?php

namespace App\Repositories;

use App\Models\Dietplan;
use App\Repositories\BaseRepository;

class DietplanRepository extends BaseRepository
{
    protected $fieldSearchable = [
        
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Dietplan::class;
    }
}
