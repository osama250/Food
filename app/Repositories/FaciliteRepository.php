<?php

namespace App\Repositories;

use App\Models\Facilite;
use App\Repositories\BaseRepository;

class FaciliteRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'main_photo'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Facilite::class;
    }
}
