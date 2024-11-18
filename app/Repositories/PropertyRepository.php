<?php

namespace App\Repositories;

use App\Models\Property;
use App\Repositories\BaseRepository;

class PropertyRepository extends BaseRepository
{
    protected $fieldSearchable = [
        
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Property::class;
    }
}
