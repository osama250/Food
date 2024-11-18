<?php

namespace App\Repositories;

use App\Models\HelpfulFact;
use App\Repositories\BaseRepository;

class HelpfulFactRepository extends BaseRepository
{
    protected $fieldSearchable = [
        
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return HelpfulFact::class;
    }
}
