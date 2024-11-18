<?php

namespace App\Repositories;

use App\Models\Drink;
use App\Repositories\BaseRepository;

class DrinkRepository extends BaseRepository
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
        return Drink::class;
    }
}
