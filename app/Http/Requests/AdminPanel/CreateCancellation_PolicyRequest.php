<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\Cancellation_Policy;
use Illuminate\Foundation\Http\FormRequest;

class CreateCancellation_PolicyRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Cancellation_Policy::rules();
    }
}
