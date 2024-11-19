<?php

namespace App\Http\Requests\AdminPanel\Meals;

use App\Models\Meal;
use Illuminate\Foundation\Http\FormRequest;

class CreateMealRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Meal::rules();
    }
}
