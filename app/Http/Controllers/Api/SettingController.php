<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Setting;


class SettingController extends Controller
{
    public function setting()
    {
        $settings       =  Setting::get()->first();
        $categories     =  Category::get();
        $contacts       =  Contact::get()->first();

        return response()->json([
            'status'        => 'true' ,
            'settings'      => $settings ,
            'categories'    => $categories ,
            'contacts'      => $contacts
        ] , 200 );
    }
}
