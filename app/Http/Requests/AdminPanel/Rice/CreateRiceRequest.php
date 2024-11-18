<?php

namespace App\Http\Requests\AdminPanel\Rice;

use App\Models\Rice;
use Illuminate\Foundation\Http\FormRequest;

class CreateRiceRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Rice::rules();
    }
}
