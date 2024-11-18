<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\ChooseUs;
use Illuminate\Foundation\Http\FormRequest;

class UpdateChooseUsRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = ChooseUs::rules();
        return $rules;
    }
}
