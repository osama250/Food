<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\Excursion;
use Illuminate\Foundation\Http\FormRequest;

class UpdateExcursionRequest extends FormRequest
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
        $rules = Excursion::rules();

        $rules['image'] = 'nullable|image|mimes:png,jpg,jpeg';
        return $rules;
    }
}
