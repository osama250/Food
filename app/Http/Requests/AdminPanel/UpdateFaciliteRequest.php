<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\Facilite;
use Illuminate\Foundation\Http\FormRequest;

class UpdateFaciliteRequest extends FormRequest
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
        $rules = Facilite::rules();

        $rules['id'] = 'required|exists:facilites,id';

        return $rules;
    }
}