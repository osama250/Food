<?php

namespace App\Repositories;

use App\Models\Cruise;
use App\Repositories\BaseRepository;

class CruiseRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'main_photo',
        'location',
        'media_link',
        'info',
        'dinning',
        'features'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Cruise::class;
    }
}
