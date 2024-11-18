<?php

namespace App\Repositories;

use App\Models\Newsletter;
use App\Repositories\BaseRepository;

class NewsletterRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'title',
        'description'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Newsletter::class;
    }
}
