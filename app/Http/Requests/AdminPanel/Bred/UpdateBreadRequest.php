<?php

namespace App\Http\Requests\AdminPanel\Bred;

use App\Models\Bread;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBreadRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = Bread::rules();
        return $rules;
    }
}
