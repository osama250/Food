<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MyUser;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgetPassword;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Http\Resources\ClientMealResource;
use App\Models\ClientMeal;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $rules = [
            'email'         => 'required|email',
            'password'      => 'required',
        ];

        $messages = [
            'email.required'        => __('auth.email-required'),
            'email.email'           => __('auth.invalid-email'),
            'password.required'     => __('auth.password-required'),
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'message' => $validator->errors()->first(),
            ], 422);
        }

        $credentials = $request->only('email', 'password');

        if (auth('client')->attempt($credentials)) {
            $user   = auth('client')->user();
            $token  = auth('client')->login($user);

            return response()->json([
                'status'    => 'success',
                'user'      => $user,
                'token'     => $token,
            ], 200 );
        } else {
            return response()->json([
                'status'    => 'failed',
                'message'   => __('auth.failed'),
            ], 422 );
        }
    }

    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), Client::$rules);

        if ($validator->fails()) {
            return response()->json([
                'status'   => 'failed',
                'message'  => $validator->errors()->first()
            ], 422);
        }

        $user = Client::create($validator->validated());

        return response()->json([
            'status' => 'true',
            'user'   => $user,
        ], 200);
    }

    // public function profile()
    // {
    //     $user = auth('client')->user()->load('meals');
    //     return response()->json( [
    //         'status'    => 'true',
    //         'user'      =>  $user
    //     ] , 200 );
    // }

    public function profile()
    {
        $user = auth('client')->user();

        // تحميل الوجبات مع التخصيصات باستخدام نموذج ClientMeal مباشرة
        $meals = ClientMeal::where('client_id', $user->id)->with('meal', 'customizations')->get();

        return response()->json([
            'status' => 'true',
            'user' => $user,
            'meals' => ClientMealResource::collection($meals),
        ], 200);
    }




    public function updateProfile( Request $request )
    {
        // return $request->all();
        $user       = auth('client')->user();
        $rules      = Client::$rules;

        $rules['name']                    = 'sometimes';
        $rules['phone']                   = 'sometimes|unique:clients,phone,' . $user->id;
        $rules['email']                   = 'sometimes|unique:clients,email,' . $user->id;
        $rules['password']                = 'sometimes|string|min:8';
        $rules['address']                 = 'sometimes';
        $rules['age']                     = 'sometimes|integer';
        $rules['weight']                  = 'sometimes|integer';
        $rules['gender']                  = 'sometimes|in:male,female';
        $rules['image']                   = 'nullable|image|mimes:jpeg,png,jpg';
        $rules['heart_disease']           = 'sometimes';
        $rules['diabetes']                = 'sometimes';
        $rules['hypertension']            = 'sometimes';
        $rules['asthma']                  = 'sometimes';
        $rules['cancer']                  = 'sometimes';



        $validator = Validator::make( $request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'message' => $validator->errors()->first()
            ], 422);
        }

        $user->update( $validator->validated() );

        return response()->json( [
            'satus'     => 'trues',
            'profile'   => $user
        ] , 200 );
    }

    public function changePassword(Request $request)
    {
        $rules = [
            'current_password'          => 'required',
            'new_password'              => 'required|min:8|confirmed',
        ];

        $messages = [
            'current_password.required' => __('auth.current_password-required'),
            'new_password.required'     => __('auth.new_password-required'),
            'new_password.min'          => __('auth.new_password-min'),
            'new_password.confirmed'    => __('auth.new_password-confirmed'),
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'status'    => 'failed',
                'message'   => $validator->errors()->first(),
            ], 422);
        }

        //  Get User
        $user = auth('client')->user();

        // Check Password
        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json([
                'status'    => 'failed',
                'message'   => __('auth.current_password_incorrect'),
            ], 422);
        }

        // Update Password
        // $user->password = Hash::make($request->new_password);
        $user->password = $request->new_password;
        $user->save();

        return response()->json([
            'status'    => 'success',
            'message'   => __('auth.password_changed'),
        ], 200);
    }

    public function logout()
    {
        $client = auth('client')->user();
        auth()->logout();
        return response()->json( [
            'status'    => 'success',
            'message'   => 'Logout',
        ] , 200 );
    }


}
