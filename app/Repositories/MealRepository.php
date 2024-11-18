<?php

namespace App\Repositories;

use App\Models\Meal;
use App\Repositories\BaseRepository;

class MealRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'image',
        'price'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Meal::class;
    }
}
