<?php

namespace App\Http\Requests\AdminPanel\Dietplan;

use App\Models\Dietplan;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDietplanRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = Dietplan::rules();
        return $rules;
    }
}
