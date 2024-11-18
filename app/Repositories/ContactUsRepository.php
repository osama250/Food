<?php

namespace App\Repositories;

use App\Models\ContactUs;
use App\Repositories\BaseRepository;

class ContactUsRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'email',
        'phone',
        'title',
        'subject'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return ContactUs::class;
    }
}
