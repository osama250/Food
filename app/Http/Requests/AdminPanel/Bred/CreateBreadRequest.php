<?php

namespace App\Http\Requests\AdminPanel\Bred;

use App\Models\Bread;
use Illuminate\Foundation\Http\FormRequest;

class CreateBreadRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Bread::rules();
    }
}
