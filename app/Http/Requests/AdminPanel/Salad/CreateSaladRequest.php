<?php

namespace App\Http\Requests\AdminPanel\Salad;

use App\Models\Salad;
use Illuminate\Foundation\Http\FormRequest;

class CreateSaladRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return Salad::rules();
    }
}
