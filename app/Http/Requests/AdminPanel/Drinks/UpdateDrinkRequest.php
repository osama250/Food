<?php

namespace App\Http\Requests\AdminPanel\Drinks;

use App\Models\Drink;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDrinkRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules              = Drink::rules();
        $rules['image']     = 'sometimes|image|max:4096';
        return $rules;
    }
}
