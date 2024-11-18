<?php

namespace App\Repositories;

use App\Models\Dining;
use App\Repositories\BaseRepository;

class DiningRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'image',
        'title',
        'text'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Dining::class;
    }
}
