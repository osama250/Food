<?php

namespace App\Repositories;

use App\Models\SideSeeing;
use App\Repositories\BaseRepository;

class SideSeeingRepository extends BaseRepository
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
        return SideSeeing::class;
    }
}
