<?php

namespace App\Http\Requests\AdminPanel\Dietplan;

use App\Models\Dietplan;
use Illuminate\Foundation\Http\FormRequest;

class CreateDietplanRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Dietplan::rules();
    }
}
