<?php

namespace App\Http\Requests\AdminPanel\Meals;

use App\Models\Meal;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMealRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = Meal::rules();
        $rules['image']     = 'sometimes|image|mimes:jpg,jpeg,png';
        return $rules;
    }
}
