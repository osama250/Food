<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Http\Traits\FileUpload;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Client extends Authenticatable implements JWTSubject
{
    use HasFactory , FileUpload , HasApiTokens ,  HasRoles;

    protected $table        = 'clients';
    protected $fillable     = [ 'name' , 'phone' , 'email', 'password' , 'image' ,
                                        'address' , 'age'  , 'weight', 'gender' ,
                                'diabetes' , 'hypertension' , 'heart_disease' , 'asthma'  ];
    protected $hidden       = ['password'];

    public static $rules = [
        'name'          => 'required' ,
        'password'      => 'required|min:8',
        'phone'         => 'required|unique:clients',
        'email'         => 'required|unique:clients',
        'address'       => 'required',
        'age'           => 'required',
        'gender'        => 'required',
        'image'         => 'nullable|image|mimes:jpg,jpeg,png',
    ];

    public function getImageAttribute()
    {
        return isset($this->attributes['image']) ? asset('admins/'
        . $this->attributes['image']) : asset('default.png');
    }

    public function setImageAttribute($value)
    {
        $fileName = time() . '.' . $value->getClientOriginalExtension();
        return $this->attributes['image'] = $this->uploadImage($value, $fileName, 'clients/');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
