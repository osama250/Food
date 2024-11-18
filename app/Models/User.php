<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Models\Reservation;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'email_verified_at',
        'code',
        'reset_code',
        'points'
    ];

    protected $appends = ['statustype'];

    static $rules =
    [
        'name' => 'required|string|unique:users,name',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|same:confirm-password|min:8',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function getStatustypeAttribute()
    {
        return $this->attributes['status'] == 1? __('lang.active') : __('lang.inactive');
    }
}
