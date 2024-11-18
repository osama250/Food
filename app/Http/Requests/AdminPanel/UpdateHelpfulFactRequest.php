<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\HelpfulFact;
use Illuminate\Foundation\Http\FormRequest;

class UpdateHelpfulFactRequest extends FormRequest
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
        $rules = HelpfulFact::rules();

        return $rules;
    }
}
