<?php

namespace App\Http\Requests\AdminPanel\Rice;

use App\Models\Rice;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRiceRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules              = Rice::rules();
        $rules['image']     = 'sometimes|image|mimes:png,jpg,jpeg';
        return $rules;
    }
}
