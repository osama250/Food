<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        return view('AdminPanel.Authentication.login');
    }

    public function postLogin(Request $request){
        $credentials = $request->only('email', 'password');

        if (auth('web')->attempt($credentials)) {
            return redirect()->intended(route('dashboard'));
        } else {
            return redirect()->back()->with("error", "invalid credentials !");
        }
    }
//     public function postLogin(Request $request)
// {
//     $credentials = $request->only('email', 'password');
//     dd($credentials); // للتحقق من البيانات المدخلة

//     if (auth('web')->attempt($credentials)) {
//         return redirect()->route('dashboard'); // تأكد من صحة هذا الروت
//     } else {
//         return redirect()->back()->with("error", "Invalid credentials!");
//     }
// }


    public function logout(){
        auth('web')->logout();
        return redirect("/");
    }
}
