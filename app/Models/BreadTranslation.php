<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BreadTranslation extends Model
{
    use HasFactory;
    protected $table        = 'bread_translations';
    protected $guarded      = [];
}
