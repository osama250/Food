<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\Blog;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
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
        $rules = Blog::rules();
        $rules['photo'] = 'nullable|image|mimes:png,jpg,jpeg';

        return $rules;
    }
}
