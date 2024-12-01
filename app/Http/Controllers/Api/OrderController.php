<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Meal;

class OrderController extends Controller
{


    // public function placeOrder(Request $request)
    // {
    //     $client = auth('client')->user();

    //     // Validate the meals data
    //     $validated = $request->validate([
    //         'meals'                     => 'required|array',
    //         'meals.*.id'                => 'exists:meals,id',
    //         'meals.*.quantity'          => 'integer|min:1',
    //         'meals.*.customizations.rice_id'   => 'nullable|exists:rices,id',
    //         'meals.*.customizations.bread_id'  => 'nullable|exists:breads,id',
    //         'meals.*.customizations.salad_id'  => 'nullable|exists:salads,id',
    //         'meals.*.customizations.drink_id'  => 'nullable|exists:drinks,id',
    //     ]);

    //     // Retrieve all meals from the database
    //     $meals = Meal::whereIn('id', collect($validated['meals'])->pluck('id'))->get();

    //     $restrictedMeals = [];
    //     $suitableMeals = [];
    //     $orderMeals = [];

    //     foreach ($meals as $meal) {
    //         // Check health condition conflicts for all 5 diseases
    //         if (
    //             ($client->diabetes && $meal->diabetes == false) ||
    //             ($client->hypertension && $meal->hypertension == false) ||
    //             ($client->heart_disease && $meal->heart_disease == false) ||
    //             ($client->asthma && $meal->asthma == false) ||
    //             ($client->cancer && $meal->cancer == false)
    //         ) {
    //             // If the client has any disease and the meal is marked as not suitable for that disease
    //             $restrictedMeals[] = $meal;  // Add to restricted meals
    //         } else {
    //             // If there is no conflict, add to suitable meals
    //             $suitableMeals[] = $meal;

    //             // Prepare the meal data for the order
    //             $mealData = collect($validated['meals'])->firstWhere('id', $meal->id);
    //             $orderMeals[] = [
    //                 'meal_id'  => $meal->id,
    //                 'quantity' => $mealData['quantity'],
    //             ];
    //         }
    //     }

    //     // If restricted meals exist, suggest alternatives and return error
    //     if (!empty($restrictedMeals)) {
    //         // Get alternative meals that are suitable for the client's health conditions
    //         $suggestions = Meal::whereNotIn('id', collect($restrictedMeals)->pluck('id'))
    //             ->where(function ($query) use ($client) {
    //                 if ($client->diabetes) $query->where('diabetes', false);
    //                 if ($client->hypertension) $query->where('hypertension', false);
    //                 if ($client->heart_disease) $query->where('heart_disease', false);
    //                 if ($client->asthma) $query->where('asthma', false);
    //                 if ($client->cancer) $query->where('cancer', false);  // Exclude meals marked as not suitable for cancer patients
    //             })->get();

    //         return response()->json([
    //             'status'             => 'error',
    //             'message'            => 'Some meals are not suitable for your health condition.',
    //             'restricted_meals'   => $restrictedMeals,
    //             'suggested_meals'    => $suggestions,
    //         ], 400);
    //     }

    //     // Proceed with attaching the meals to the client
    //     if (!empty($orderMeals)) {
    //         // Create client meals and get their IDs
    //         foreach ($orderMeals as $orderMeal) {
    //             $clientMeal = \App\Models\ClientMeal::create([
    //                 'client_id' => $client->id,
    //                 'meal_id'   => $orderMeal['meal_id'],
    //                 'quantity'  => $orderMeal['quantity'],
    //             ]);

    //             // Add customizations if present
    //             $mealData = collect($validated['meals'])->firstWhere('id', $orderMeal['meal_id']);
    //             if (isset($mealData['customizations'])) {
    //                 \App\Models\ClientMealCustomization::create([
    //                     'client_meal_id' => $clientMeal->id,
    //                     'rice_id'        => $mealData['customizations']['rice_id'] ?? null,
    //                     'bread_id'       => $mealData['customizations']['bread_id'] ?? null,
    //                     'salad_id'       => $mealData['customizations']['salad_id'] ?? null,
    //                     'drink_id'       => $mealData['customizations']['drink_id'] ?? null,
    //                 ]);
    //             }
    //         }
    //     }

    //     return response()->json([
    //         'status'  => 'success',
    //         'message' => 'Order placed successfully!',
    //         'meals'   => $suitableMeals,
    //     ], 200);
    // }

    // public function placeOrder(Request $request)
    // {
    //     $client = auth('client')->user();

    //     // Validate the meals data
    //     $validated = $request->validate([
    //         'meals'                     => 'required|array',
    //         'meals.*.id'                => 'exists:meals,id',
    //         'meals.*.quantity'          => 'integer|min:1',
    //         'meals.*.customizations.rice_id'   => 'nullable|exists:rices,id',
    //         'meals.*.customizations.bread_id'  => 'nullable|exists:breads,id',
    //         'meals.*.customizations.salad_id'  => 'nullable|exists:salads,id',
    //         'meals.*.customizations.drink_id'  => 'nullable|exists:drinks,id',
    //     ]);

    //     // Retrieve all meals from the database
    //     $meals = Meal::whereIn('id', collect($validated['meals'])->pluck('id')->toArray())->get();

    //     $restrictedMeals = [];
    //     $suitableMeals = [];
    //     $orderMeals = [];
    //     $restrictionMessages = []; // تعريف المصفوفة قبل استخدامها
    //     $suggestedMeals = []; // تعريف المصفوفة قبل استخدامها

    //     // Define the diseases list
    //     $diseases = ['diabetes', 'hypertension', 'heart_disease', 'asthma', 'cancer'];

    //     foreach ($meals as $meal) {
    //         $restrictedDiseases = []; // مصفوفة لتخزين الأمراض التي تمنع العميل من تناول الوجبة

    //         // تحقق من الأمراض في جدول العميل مقارنةً بالوجبة
    //         if ($client->diabetes && $meal->diabetes == false) {
    //             $restrictedDiseases[] = 'Diabetes';
    //         }
    //         if ($client->hypertension && $meal->hypertension == false) {
    //             $restrictedDiseases[] = 'Hypertension';
    //         }
    //         if ($client->heart_disease && $meal->heart_disease == false) {
    //             $restrictedDiseases[] = 'Heart Disease';
    //         }
    //         if ($client->asthma && $meal->asthma == false) {
    //             $restrictedDiseases[] = 'Asthma';
    //         }
    //         if ($client->cancer && $meal->cancer == false) {
    //             $restrictedDiseases[] = 'Cancer';
    //         }

    //         // إذا كان هناك تعارض مع أي مرض
    //         if (!empty($restrictedDiseases)) {
    //             // إضافة الوجبة إلى الممنوعة
    //             $restrictedMeals[] = $meal;

    //             // دمج أسماء الأمراض الممنوعة في رسالة واحدة
    //             $restrictedDiseasesList = implode(', ', $restrictedDiseases);
    //             $mealName = $meal->getTranslation('name', app()->getLocale());
    //             $message = "You cannot order the meal '$mealName' because it is not suitable for your health condition. Restricted diseases: $restrictedDiseasesList";

    //             // عرض الرسالة
    //             $restrictionMessages[] = $message;
    //         } else {
    //             // إذا كانت الوجبة مناسبة
    //             $suitableMeals[] = $meal;

    //             // إعداد بيانات الوجبة للطلب
    //             $mealData = collect($validated['meals'])->firstWhere('id', $meal->id);
    //             $orderMeals[] = [
    //                 'meal_id'  => $meal->id,
    //                 'quantity' => $mealData['quantity'],
    //             ];
    //         }
    //     }

    //     // إذا كانت هناك وجبات ممنوعة
    //     if (!empty($restrictedMeals)) {
    //         // جمع البدائل
    //         $suggestedMeals = Meal::whereNotIn('id', collect($restrictedMeals)->pluck('id'))
    //             ->where(function ($query) use ($client) {
    //                 if ($client->diabetes) $query->where('diabetes', false);
    //                 if ($client->hypertension) $query->where('hypertension', false);
    //                 if ($client->heart_disease) $query->where('heart_disease', false);
    //                 if ($client->asthma) $query->where('asthma', false);
    //                 if ($client->cancer) $query->where('cancer', false);  // استبعاد الوجبات غير المناسبة للسرطان
    //             })->get();

    //         // جمع رسائل التقييد مع الترجمة
    //         foreach ($restrictedMeals as $meal) {
    //             $conflictMessage = __("The meal :meal is restricted due to your health condition.", ['meal' => $meal->getTranslation('name', app()->getLocale())]);
    //             $restrictionMessages[] = $conflictMessage;
    //         }

    //         return response()->json([
    //             'status'             => 'error',
    //             'message'            => __('Some meals are not suitable for your health condition.'),
    //             'restricted_meals'   => $restrictedMeals,
    //             'suggested_meals'    => $suggestedMeals,
    //             'restriction_messages' => $restrictionMessages, // عرض الرسائل المحظورة
    //         ], 400);
    //     }

    //     // Proceed with attaching the meals to the client
    //     if (!empty($orderMeals)) {
    //         // Create client meals and get their IDs
    //         foreach ($orderMeals as $orderMeal) {
    //             $clientMeal = \App\Models\ClientMeal::create([
    //                 'client_id' => $client->id,
    //                 'meal_id'   => $orderMeal['meal_id'],
    //                 'quantity'  => $orderMeal['quantity'],
    //             ]);

    //             // Add customizations if present
    //             $mealData = collect($validated['meals'])->firstWhere('id', $orderMeal['meal_id']);
    //             if (isset($mealData['customizations'])) {
    //                 \App\Models\ClientMealCustomization::create([
    //                     'client_meal_id' => $clientMeal->id,
    //                     'rice_id'        => $mealData['customizations']['rice_id'] ?? null,
    //                     'bread_id'       => $mealData['customizations']['bread_id'] ?? null,
    //                     'salad_id'       => $mealData['customizations']['salad_id'] ?? null,
    //                     'drink_id'       => $mealData['customizations']['drink_id'] ?? null,
    //                 ]);
    //             }
    //         }
    //     }

    //     return response()->json([
    //         'status'  => 'success',
    //         'message' => 'Order placed successfully!',
    //         'meals'   => $suitableMeals,
    //     ], 200);
    // }

    // public function placeOrder(Request $request)
    // {
    //     $client = auth('client')->user();

    //     // Validate the meals data
    //     $validated = $request->validate([
    //         'meals'                     => 'required|array',
    //         'meals.*.id'                => 'exists:meals,id',
    //         'meals.*.quantity'          => 'integer|min:1',
    //         'meals.*.customizations.rice_id'   => 'nullable|exists:rices,id',
    //         'meals.*.customizations.bread_id'  => 'nullable|exists:breads,id',
    //         'meals.*.customizations.salad_id'  => 'nullable|exists:salads,id',
    //         'meals.*.customizations.drink_id'  => 'nullable|exists:drinks,id',
    //     ]);

    //     // Retrieve all meals from the database
    //     $meals = Meal::whereIn('id', collect($validated['meals'])->pluck('id')->toArray())->get();

    //     $restrictedMeals = [];
    //     $suitableMeals = [];
    //     $orderMeals = [];
    //     $restrictionMessages = []; // تعريف المصفوفة قبل استخدامها

    //     // Define the diseases list
    //     $diseases = ['diabetes', 'hypertension', 'heart_disease', 'asthma', 'cancer'];

    //     foreach ($meals as $meal) {
    //         $restrictedDiseases = []; // مصفوفة لتخزين الأمراض التي تمنع العميل من تناول الوجبة

    //         // تحقق من الأمراض في جدول العميل مقارنةً بالوجبة
    //         if ($client->diabetes && $meal->diabetes == false) {
    //             $restrictedDiseases[] = 'Diabetes';
    //         }
    //         if ($client->hypertension && $meal->hypertension == false) {
    //             $restrictedDiseases[] = 'Hypertension';
    //         }
    //         if ($client->heart_disease && $meal->heart_disease == false) {
    //             $restrictedDiseases[] = 'Heart Disease';
    //         }
    //         if ($client->asthma && $meal->asthma == false) {
    //             $restrictedDiseases[] = 'Asthma';
    //         }
    //         if ($client->cancer && $meal->cancer == false) {
    //             $restrictedDiseases[] = 'Cancer';
    //         }

    //         // إذا كان هناك تعارض مع أي مرض
    //         if (!empty($restrictedDiseases)) {
    //             // إضافة الوجبة إلى الممنوعة
    //             $restrictedMeals[] = $meal;

    //             // دمج أسماء الأمراض الممنوعة في رسالة واحدة
    //             $restrictedDiseasesList = implode(', ', $restrictedDiseases);
    //             $message = "You cannot order the meal because it is not suitable for your health condition. Restricted diseases: $restrictedDiseasesList";

    //             // عرض الرسالة
    //             $restrictionMessages[] = $message;
    //         } else {
    //             // إذا كانت الوجبة مناسبة
    //             $suitableMeals[] = $meal;

    //             // إعداد بيانات الوجبة للطلب
    //             $mealData = collect($validated['meals'])->firstWhere('id', $meal->id);
    //             $orderMeals[] = [
    //                 'meal_id'  => $meal->id,
    //                 'quantity' => $mealData['quantity'],
    //             ];
    //         }
    //     }

    //     // إذا كانت هناك وجبات ممنوعة
    //     if (!empty($restrictedMeals)) {
    //         return response()->json([
    //             'status'               => 'error',
    //             // 'message'              => 'Some meals are not suitable for your health condition.',
    //             'message'              => $restrictionMessages,
    //             'restricted_meals'     => $restrictedMeals,
    //             // 'Reason_for_rejection' => $restrictionMessages, // عرض الرسائل المحظورة بشكل مبسط
    //         ], 400);
    //     }

    //     // Proceed with attaching the meals to the client
    //     if (!empty($orderMeals)) {
    //         // Create client meals and get their IDs
    //         foreach ($orderMeals as $orderMeal) {
    //             $clientMeal = \App\Models\ClientMeal::create([
    //                 'client_id' => $client->id,
    //                 'meal_id'   => $orderMeal['meal_id'],
    //                 'quantity'  => $orderMeal['quantity'],
    //             ]);

    //             // Add customizations if present
    //             $mealData = collect($validated['meals'])->firstWhere('id', $orderMeal['meal_id']);
    //             if (isset($mealData['customizations'])) {
    //                 \App\Models\ClientMealCustomization::create([
    //                     'client_meal_id' => $clientMeal->id,
    //                     'rice_id'        => $mealData['customizations']['rice_id'] ?? null,
    //                     'bread_id'       => $mealData['customizations']['bread_id'] ?? null,
    //                     'salad_id'       => $mealData['customizations']['salad_id'] ?? null,
    //                     'drink_id'       => $mealData['customizations']['drink_id'] ?? null,
    //                 ]);
    //             }
    //         }
    //     }

    //     return response()->json([
    //         'status'  => 'success',
    //         'message' => 'Order placed successfully!',
    //         'meals'   => $suitableMeals,
    //     ], 200);
    // }
    public function placeOrder(Request $request)
    {
        $client = auth('client')->user();

        // Validate the meals data
        $validated = $request->validate([
            'meals'                     => 'required|array',
            'meals.*.id'                => 'exists:meals,id',
            'meals.*.quantity'          => 'integer|min:1',
            'meals.*.customizations.rice_id'   => 'nullable|exists:rices,id',
            'meals.*.customizations.bread_id'  => 'nullable|exists:breads,id',
            'meals.*.customizations.salad_id'  => 'nullable|exists:salads,id',
            'meals.*.customizations.drink_id'  => 'nullable|exists:drinks,id',
        ]);

        // Retrieve all meals from the database
        $meals = Meal::whereIn('id', collect($validated['meals'])->pluck('id')->toArray())->get();

        $restrictedMeals = [];
        $suitableMeals = [];
        $orderMeals = [];
        $restrictionMessages = [];

        // Total price of the order
        $totalPrice = 0;

        foreach ($meals as $meal) {
            $restrictedDiseases = [];

            // Check for disease restrictions
            if ($client->diabetes && $meal->diabetes == false) {
                $restrictedDiseases[] = 'Diabetes';
            }
            if ($client->hypertension && $meal->hypertension == false) {
                $restrictedDiseases[] = 'Hypertension';
            }
            if ($client->heart_disease && $meal->heart_disease == false) {
                $restrictedDiseases[] = 'Heart Disease';
            }
            if ($client->asthma && $meal->asthma == false) {
                $restrictedDiseases[] = 'Asthma';
            }
            if ($client->cancer && $meal->cancer == false) {
                $restrictedDiseases[] = 'Cancer';
            }

            // If there are any restrictions, skip the meal
            if (!empty($restrictedDiseases)) {
                $restrictedMeals[] = $meal;
                $restrictedDiseasesList = implode(', ', $restrictedDiseases);
                $message = "You cannot order the meal because it is not suitable for your health condition. Restricted diseases: $restrictedDiseasesList";
                $restrictionMessages[] = $message;
            } else {
                $suitableMeals[] = $meal;

                // Get the quantity of the meal from the validated input
                $mealData = collect($validated['meals'])->firstWhere('id', $meal->id);

                // Calculate the price for this meal and add it to the total
                $mealPrice = $meal->price * $mealData['quantity'];
                $totalPrice += $mealPrice;

                // Add the meal to the order
                $orderMeals[] = [
                    'meal_id'  => $meal->id,
                    'quantity' => $mealData['quantity'],
                    'price'    => $mealPrice,  // store the price per meal
                ];
            }
        }

        // If there are any restricted meals, return an error
        if (!empty($restrictedMeals)) {
            return response()->json([
                'status'               => 'error',
                'message'              => $restrictionMessages,
                'restricted_meals'     => $restrictedMeals,
            ], 400);
        }

        // Proceed with attaching the meals to the client
        if (!empty($orderMeals)) {
            foreach ($orderMeals as $orderMeal) {
                // تأكد من تضمين السعر عند إنشاء السجل
                $clientMeal = \App\Models\ClientMeal::create([
                    'client_id' => $client->id,
                    'meal_id'   => $orderMeal['meal_id'],
                    'quantity'  => $orderMeal['quantity'],
                    'price'     => $orderMeal['price'],  // تأكد من تضمين السعر هنا
                ]);

                // إضافة التخصيصات إذا كانت موجودة
                $mealData = collect($validated['meals'])->firstWhere('id', $orderMeal['meal_id']);
                if (isset($mealData['customizations'])) {
                    \App\Models\ClientMealCustomization::create([
                        'client_meal_id' => $clientMeal->id,
                        'rice_id'        => $mealData['customizations']['rice_id'] ?? null,
                        'bread_id'       => $mealData['customizations']['bread_id'] ?? null,
                        'salad_id'       => $mealData['customizations']['salad_id'] ?? null,
                        'drink_id'       => $mealData['customizations']['drink_id'] ?? null,
                    ]);
                }
            }

        }

        // Return the success response with the total price
        return response()->json([
            'status'    => 'success',
            'message'   => 'Order placed successfully!',
            'meals'     => $suitableMeals,
            'total_price' => $totalPrice,  // return the total price
        ], 200);
    }

}
