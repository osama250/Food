<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientMeal extends Model
{
    use HasFactory;
    protected $table = 'client_meals';

    protected $fillable = [
        'client_id',
        'meal_id',
        'quantity',
    ];
}
