<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\ChooseUs;
use Illuminate\Foundation\Http\FormRequest;

class CreateChooseUsRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return ChooseUs::rules();
    }
}
