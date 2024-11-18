<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\Coupon;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCouponRequest extends FormRequest
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
        $rules = Coupon::rules();
        $rules['id'] = 'required|exists:coupons,id';
        $rules['name'] = 'required|unique:coupons,name,'.$this->id.'|string' ;
        return $rules;
    }
}