<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\Trip;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTripRequest extends FormRequest
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
        $rules = Trip::rules();
        $rules['id'] = 'required|exists:trips,id';
        $rules['photos'] = 'nullable|array';
        $rules['photos.*'] = 'nullable|string';
        $rules['main_photo'] = 'nullable|image|mimes:png,jpg,jpeg';
        return $rules;
    }
}
