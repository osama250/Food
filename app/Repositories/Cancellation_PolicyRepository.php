<?php

namespace App\Repositories;

use App\Models\Cancellation_Policy;
use App\Repositories\BaseRepository;

class Cancellation_PolicyRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'title',
        'content',
        'iamge'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Cancellation_Policy::class;
    }
}
