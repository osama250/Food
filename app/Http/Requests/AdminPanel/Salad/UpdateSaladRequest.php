<?php

namespace App\Http\Requests\AdminPanel\Salad;

use App\Models\Salad;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSaladRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules             = Salad::rules();
        $rules['image']    = 'sometimes|image|mimes:jpg,jpeg,png';
        return $rules;
    }
}
