<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\FileUpload;
use Astrotomic\Translatable\Translatable;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Bread extends Model
{
    use Translatable, FileUpload;
    public $table                   = 'breads';
    public $fillable                = [ 'image' , 'name' ];
    public $translatedAttributes    = [ 'name' ];

    protected $casts = [
        'id'        => 'integer',
        'image'     => 'string'
    ];

    public static function rules()
    {
        $langs = LaravelLocalization::getSupportedLanguagesKeys();
        foreach ($langs as $lang) {
            $rules[$lang . '.name']      = 'required|string|min:5';
        }
        $rules['image']                  = 'required|image|mimes:jpg,jpeg,png';
        return $rules;
    }

    public function setImageAttribute($image)
    {
        if (is_string($image)) {
            $this->attributes['image'] = $image;
        } else {
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $this->attributes['image'] = $this->uploadImage($image, $fileName, 'uploads/breads/');
        }
    }

    public function getImageAttribute()
    {
        return  isset($this->attributes['image']) ? asset('uploads/breads/' .
        $this->attributes['image']) : NULL;
    }

    public function meals()
    {
        return $this->hasMany( Meal::class );
    }

}
