<?php

namespace App\Repositories;

use App\Models\FacilityType;
use App\Repositories\BaseRepository;

class FacilityTypeRepository extends BaseRepository
{
    protected $fieldSearchable = [
        
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return FacilityType::class;
    }
}
