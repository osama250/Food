<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Dietplan extends Model
{
    use Translatable;
    public $table                   = 'dietplans';
    public $fillable                = [ 'disease' ,'name', 'description' ];
    public $translatedAttributes    = [ 'name' , 'description' ];

    protected $casts = [
        'id' => 'integer'
    ];

    public static function rules()
    {
        $langs = LaravelLocalization::getSupportedLanguagesKeys();
        foreach ($langs as $lang) {
            $rules[$lang . '.name']         = 'required|string|min:5';
            $rules[$lang . '.description']  = 'required|string|min:5';
        }
        $rules['disease'] = 'required|in:none,diabetes,hypertension,heart_disease,asthma,cancer';
        return $rules;
    }


}
