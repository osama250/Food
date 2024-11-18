<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\SideSeeing;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSideSeeingRequest extends FormRequest
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
        $rules['id'] = 'required|exists:side_seeings,id';
        $rules['main_photo'] = 'nullable|image|mimes:jpg,png,jpeg';
        $rules['photos'] = 'nullable|array';
        $rules['photos.*'] = 'nullable';
        return $rules;
    }
}
