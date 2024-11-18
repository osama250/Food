<?php

namespace App\Repositories;

use App\Models\Offer;
use App\Repositories\BaseRepository;

class OfferRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'trip_id',
        'start_date',
        'end_date',
        'value',
        'type'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Offer::class;
    }
}
