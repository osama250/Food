<?php

namespace App\Http\Requests\AdminPanel\Contact;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Contact;

class UpdateContactRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Contact::rules();
    }
}
