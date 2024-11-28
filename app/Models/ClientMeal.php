<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientMeal extends Model
{
    use HasFactory;
    protected $table = 'client_meals';

    protected $fillable = [  'client_id',  'meal_id',  'quantity' ];

    // public function meal()
    // {
    //     return $this->belongsTo( Meal::class );
    // }

    public function meal()
    {
        return $this->belongsTo(Meal::class)->with('rice', 'bread', 'salad', 'drink');
    }
    public function getRiceAttribute()
    {
        return $this->customizations && $this->customizations->rice ? $this->customizations->rice : $this->meal->rice;
    }

    public function getBreadAttribute()
    {
        return $this->customizations && $this->customizations->bread ? $this->customizations->bread : $this->meal->bread;
    }

    public function getSaladAttribute()
    {
        return $this->customizations && $this->customizations->salad ? $this->customizations->salad : $this->meal->salad;
    }

    public function getDrinkAttribute()
    {
        return $this->customizations && $this->customizations->drink ? $this->customizations->drink : $this->meal->drink;
    }

    public function customizations()
    {
        return $this->hasOne( ClientMealCustomization::class);
    }

}
