<?php

namespace App\Repositories;

use App\Models\Rice;
use App\Repositories\BaseRepository;

class RiceRepository extends BaseRepository
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
        return Rice::class;
    }
}
