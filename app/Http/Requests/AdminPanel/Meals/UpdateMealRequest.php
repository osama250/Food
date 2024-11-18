<?php

namespace App\Http\Requests\AAdminPanel\Meals;

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
        $rules = Meal::$rules;
        return $rules;
    }
}
