<?php

namespace App\Repositories;

use App\Models\FaciliteCategory;
use App\Repositories\BaseRepository;

class FaciliteCategoryRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'category'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return FaciliteCategory::class;
    }
}
