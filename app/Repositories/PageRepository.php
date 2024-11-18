<?php

namespace App\Repositories;

use App\Models\Page;
use App\Repositories\BaseRepository;

class PageRepository extends BaseRepository
{
    protected $fieldSearchable = [
        
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Page::class;
    }
}
