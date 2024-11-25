<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Meal;

class MealController extends Controller
{
    public function mealDetails( $id )
    {
        $meal = Meal::with('rice' , 'bread' , 'drink' , 'salad')->findOrFail($id);
        return response()->json([
            'satus'   => true ,
            'meal'    => $meal
        ] , 200 );
    }
}
