<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\FileUpload;
use Astrotomic\Translatable\Translatable;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Meal extends Model
{
    use Translatable , FileUpload;
    public $table    = 'meals';
    public $fillable = [ 'image', 'price' , 'category_id' , 'salad_id' , 'rice_id' , 'drink_id' , 'bread_id' ,
                         'diabetes' , 'hypertension' , 'heart_disease' , 'asthma' , 'cancer' ,
                         'name' , 'description' ];

    public $translatedAttributes = ['name' , 'description'];

    protected $casts = [
        'id'            => 'integer',
        'image'         => 'string',
        'price'         => 'integer',
        'cancer'        => 'boolean',
        'diabetes'      => 'boolean',
        'hypertension'  => 'boolean',
        'heart_disease' => 'boolean',
        'asthma'        => 'boolean',
    ];

    public function setImageAttribute($image)
    {
        if (is_string($image)) {
            $this->attributes['image'] = $image;
        } else {
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $this->attributes['image'] = $this->uploadImage($image, $fileName, 'uploads/meals/');
        }
    }

    public function getImageAttribute()
    {
        return  isset($this->attributes['image']) ? asset('uploads/meals/' .
        $this->attributes['image']) : NULL;
    }

    public static  function boot()
    {
        parent::boot();
        static::deleted(function ($model) {
            if (!empty($model->image)) {
                $file = explode('/', $model->image);
                $fileName = end($file);
                $model->removeImage($fileName, 'uploads/meals/');
            }

            if (!empty($model->meta_image)) {
                $file = explode('/', $model->meta_image);
                $fileName = end($file);
                $model->removeImage($fileName, 'uploads/meals/');
            }
        });
    }

    public static function rules () {
        $langs = LaravelLocalization::getSupportedLanguagesKeys();
        foreach ($langs as $lang) {
            $rules[$lang . '.name']             = 'required|string|min:5';
            $rules[$lang . '.description']      = 'required|string|min:5';
        }
        $rules['price']                         = 'required|numeric|not_in:0|min:1';
        $rules['category_id']                   = 'required|exists:categories,id';
        $rules['salad_id']                      = 'required|exists:salads,id';
        $rules['rice_id']                       = 'required|exists:rices,id';
        $rules['drink_id']                      = 'required|exists:drinks,id';
        $rules['bread_id']                      = 'required|exists:breads,id';
        $rules['diabetes']                      = 'required|boolean';
        $rules['hypertension']                  = 'required|boolean';
        $rules['heart_disease']                 = 'required|boolean';
        $rules['asthma']                        = 'required|boolean';
        $rules['cancer']                        = 'required|boolean';
        $rules['image']                         = 'required|image|mimes:jpg,jpeg,png';
        return $rules;
    }

    public function category()
    {
        return $this->belongsTo( Category::class );
    }

    public function salad()
    {
        return $this->belongsTo( Salad::class );
    }

    public function rice()
    {
        return $this->belongsTo( Rice::class );
    }

    public function drink()
    {
        return $this->belongsTo( Drink::class );
    }

    public function bread()
    {
        return $this->belongsTo( Bread::class );
    }

    public function clients()
    {
        return $this->belongsToMany(Client::class, 'client_meals')->withPivot('quantity')->withTimestamps();
    }

    public function translations()
    {
        return $this->hasMany(MealTranslation::class);
    }

}
