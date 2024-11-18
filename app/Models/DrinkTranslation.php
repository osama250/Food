<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrinkTranslation extends Model
{
    use HasFactory;
    protected $table        = 'drink_translations';
    protected $guarded      = [];
}
