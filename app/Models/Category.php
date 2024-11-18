<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\FileUpload;
use Astrotomic\Translatable\Translatable;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Category extends Model
{
    use Translatable, FileUpload;
    public $table                   = 'categories';
    public $fillable                = ['image' , 'title' , 'description'];
    public $translatedAttributes    = ['title' , 'description'];

    protected $casts = [
        'id'    => 'integer',
        'image' => 'string'
    ];

    public static function rules() {
        $langs = LaravelLocalization::getSupportedLanguagesKeys();
        foreach ($langs as $lang) {
            $rules[$lang . '.title']            = 'required|string|min:5';
            $rules[$lang . '.description']      = 'required|string|min:5';
        }
        $rules['image'] = 'required|image|mimes:jpg,jpeg,png';
        return $rules;
    }

    public function setImageAttribute($image)
    {
        if (is_string($image)) {
            $this->attributes['image'] = $image;
        } else {
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $this->attributes['image'] = $this->uploadImage($image, $fileName, 'uploads/categories/');
        }
    }

    public function getImageAttribute()
    {
        return  isset($this->attributes['image']) ? asset('uploads/categories/' .
        $this->attributes['image']) : NULL;
    }

    public static  function boot()
    {
        parent::boot();
        static::deleted(function ($model) {
            if (!empty($model->image)) {
                $file = explode('/', $model->image);
                $fileName = end($file);
                $model->removeImage($fileName, 'uploads/categories/');
            }

            if (!empty($model->meta_image)) {
                $file = explode('/', $model->meta_image);
                $fileName = end($file);
                $model->removeImage($fileName, 'uploads/categories/');
            }
        });
    }
}
