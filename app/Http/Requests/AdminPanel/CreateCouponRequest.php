<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\Coupon;
use Illuminate\Foundation\Http\FormRequest;

class CreateCouponRequest extends FormRequest
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

    
    public function rules()
    {
        return Coupon::rules();
    }
}