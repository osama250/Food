<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientMealCustomization extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_meal_id',
        'rice_id',
        'bread_id',
        'salad_id',
        'drink_id'
    ];

    public function clientMeal()
    {
        return $this->belongsTo(ClientMeal::class);
    }

    public function rice()
    {
        return $this->belongsTo(Rice::class);
    }

    public function bread()
    {
        return $this->belongsTo(Bread::class);
    }

    public function salad()
    {
        return $this->belongsTo(Salad::class);
    }

    public function drink()
    {
        return $this->belongsTo(Drink::class);
    }
}
