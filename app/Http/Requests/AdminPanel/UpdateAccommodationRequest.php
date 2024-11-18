<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\Accommodation;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAccommodationRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules           = Accommodation::rules();
        $rules['image']  = 'nullable|image|mimes:png,jpg,jpeg';
        return $rules;
    }
}
