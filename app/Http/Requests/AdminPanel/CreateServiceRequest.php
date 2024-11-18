<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\Service;
use Illuminate\Foundation\Http\FormRequest;

class CreateServiceRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Service::rules();
    }
}
