<?php

namespace App\Repositories;

use App\Models\Accommodation;
use App\Repositories\BaseRepository;

class AccommodationRepository extends BaseRepository
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
        return Accommodation::class;
    }
}
