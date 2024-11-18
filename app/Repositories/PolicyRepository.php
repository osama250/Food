<?php

namespace App\Repositories;

use App\Models\Policy;
use App\Repositories\BaseRepository;

class PolicyRepository extends BaseRepository
{
    protected $fieldSearchable = [
        
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Policy::class;
    }
}
