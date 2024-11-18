<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\Cruise;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCruiseRequest extends FormRequest
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
        $rules = Cruise::rules();

        $rules['id'] = 'required|exists:cruises,id';
        $rules['main_photo'] = 'nullable|image|mimes:png,jpg,jpeg' ;
        $rules['photos'] = 'nullable|array';
        $rules['photos.*'] = 'nullable|string';
        $rules['feature_photos'] = 'nullable|array';
        $rules['feature_photos.*'] = 'nullable|string';

        return $rules;
    }
}
