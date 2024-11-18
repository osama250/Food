<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\Dining;
use Illuminate\Foundation\Http\FormRequest;

class CreateDiningRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Dining::rules();
    }
}
