<?php

namespace App\Http\Requests\AdminPanel\Drinks;

use App\Models\Drink;
use Illuminate\Foundation\Http\FormRequest;

class CreateDrinkRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Drink::rules();
    }
}
