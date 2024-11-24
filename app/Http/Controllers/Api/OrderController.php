<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Meal;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        $client = auth('client')->user();
        // return $client;

        // Validate the meals data
        $validated = $request->validate([
            'meals'             => 'required|array',
            'meals.*.id'        => 'exists:meals,id',
            'meals.*.quantity'  => 'integer|min:1',
        ]);

        $meals  = Meal::whereIn('id', collect($validated['meals'])->pluck('id'))->get();

        $restrictedMeals        = [];
        $suitableMeals          = [];
        $orderMeals             = [];

        foreach ($meals as $meal) {
            // Check health condition conflicts
            if (
                ($client->diabetes && $meal->diabetes) ||
                ($client->hypertension && $meal->hypertension) ||
                ($client->heart_disease && $meal->heart_disease) ||
                ($client->asthma && $meal->asthma) ||
                ($client->cancer && $meal->cancer)
            ) {
                $restrictedMeals[] = $meal; // Add to restricted meals
            } else {
                $suitableMeals[] = $meal; // Add to suitable meals
                // Prepare meal data for order
                $mealData               = collect($validated['meals'])->firstWhere('id', $meal->id);
                $orderMeals[$meal->id]  = ['quantity' => $mealData['quantity']];
            }
        }

        // If restricted meals exist, suggest alternatives and return error
        if (!empty($restrictedMeals)) {
            $suggestions = Meal::whereNotIn('id', collect($restrictedMeals)->pluck('id'))
                ->where(function ($query) use ($client) {
                    if ($client->diabetes) $query->where('diabetes', false);
                    if ($client->hypertension) $query->where('hypertension', false);
                    if ($client->heart_disease) $query->where('heart_disease', false);
                    if ($client->asthma) $query->where('asthma', false);
                    if ($client->cancer) $query->where('cancer', false);
                })->get();

            return response()->json([
                'status'             => 'error',
                'message'            => 'Some meals are not suitable for your health condition.',
                'restricted_meals'   => $restrictedMeals,
                'suggested_meals'    => $suggestions,
            ], 400);
        }

        if (!empty($orderMeals)) {
            $client->meals()->attach($orderMeals);
        }

        return response()->json([
            'status'        => 'success',
            'message'       => 'Order placed successfully!',
            'meals'         => $suitableMeals,
        ], 200);
    }

}
