<?php

namespace App\Repositories;

use App\Models\Trip;
use App\Repositories\BaseRepository;

class TripRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'sailling_date',
        'time',
        'arrive_date',
        'main_photo',
        'departs',
        'ports',
        'price',
        'cruise_id'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Trip::class;
    }
}
