<?php

namespace App\Repositories;

use App\Models\Blog;
use App\Repositories\BaseRepository;

class BlogRepository extends BaseRepository
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
        return Blog::class;
    }
}
