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
                                'diabetes' , 'hypertension' , 'heart_disease' , 'asthma' ,'cancer' ];
    protected $hidden       = ['password'];

    protected $casts = [
        'diabetes'          => 'boolean',
        'hypertension'      => 'boolean',
        'heart_disease'     => 'boolean',
        'asthma'            => 'boolean',
        'cancer'            => 'boolean',
        'age'               => 'integer',
        'weight'            => 'integer'
    ];

    public static $rules = [
        'name'          => 'required' ,
        'password'      => 'required|min:8',
        'phone'         => 'required|unique:clients',
        'email'         => 'required|unique:clients',
        'address'       => 'required',
        'age'           => 'required',
        'weight'        => 'required',
        'gender'        => 'required',
        'image'         => 'nullable|image|mimes:jpg,jpeg,png',
        'diabetes'      => 'required|boolean',
        'hypertension'  => 'required|boolean',
        'heart_disease' => 'required|boolean',
        'asthma'        => 'required|boolean',
        'cancer'        => 'required|boolean',
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

    public static  function boot()
    {
        parent::boot();
        static::deleted(function ($model) {
            if (!empty($model->image)) {
                $file = explode('/', $model->image);
                $fileName = end($file);
                $model->removeImage($fileName, 'uploads/clients/');
            }

            if (!empty($model->meta_image)) {
                $file = explode('/', $model->meta_image);
                $fileName = end($file);
                $model->removeImage($fileName, 'uploads/clients/');
            }
        });
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

    public function meals()
    {
        return $this->belongsToMany(Meal::class, 'client_meals')->withPivot('quantity')->withTimestamps();
    }
}
