<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\Policy;
use Illuminate\Foundation\Http\FormRequest;

class CreatePolicyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Policy::rules();
    }
}