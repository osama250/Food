<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\Cancellation_Policy;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCancellation_PolicyRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules           = Cancellation_Policy::rules();
        $rules['image']  = 'nullable|image|mimes:png,jpg,jpeg';
        return $rules;
    }
}
