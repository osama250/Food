<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\Slider;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSliderRequest extends FormRequest
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
        $rules = Slider::$rules;

        $rules['media'] = 'nullable|file|mimes:jpg,png,mp4,jpeg,avi';

        return $rules;
    }
}