<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Setting;
use App\Models\Rice;
use App\Models\Bread;
use App\Models\Drink;
use App\Models\Salad;

class SettingController extends Controller
{
    public function setting()
    {
        $settings       =  Setting::get()->first();
        $categories     =  Category::get();
        $contacts       =  Contact::get()->first();
        $ricee          =  Rice::get();
        $braeds         =  Bread::get();
        $drinks         =  Drink::get();
        $salads         =  Salad::get();

        return response()->json([
            'status'        => 'true' ,
            'settings'      => $settings ,
            'categories'    => $categories ,
            'contacts'      => $contacts ,
            'ricee'         => $ricee ,
            'braeds'        => $braeds ,
            'drinks'        => $drinks ,
            'salads'        => $salads
        ] , 200 );
    }
}
