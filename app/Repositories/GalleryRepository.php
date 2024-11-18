<?php

namespace App\Repositories;

use App\Models\Gallery;
use App\Repositories\BaseRepository;

class GalleryRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'photo'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Gallery::class;
    }
}
