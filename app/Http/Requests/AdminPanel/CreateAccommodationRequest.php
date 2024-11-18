<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\Accommodation;
use Illuminate\Foundation\Http\FormRequest;

class CreateAccommodationRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Accommodation::rules();
    }
}
