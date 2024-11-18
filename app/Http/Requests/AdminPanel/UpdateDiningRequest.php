<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\Dining;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDiningRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules            = Dining::rules();
        $rules['image']   = 'nullable|image|mimes:png,jpg,jpeg';
        return $rules;
    }
}
