<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaladTranslation extends Model
{
    use HasFactory;
    protected $table        = 'salad_translations';
    protected $guarded      = [];
}
