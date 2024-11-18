<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\Service;
use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules           = Service::rules();
        $rules['image']  = 'nullable|image|mimes:png,jpg,jpeg';
        return $rules;
    }
}
