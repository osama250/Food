<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\CategoryTranslation;

class CategorySeeder extends Seeder
{
    public function run()
    {

        $category = Category::create([
                'image' => 'default.png',
            ]);

        CategoryTranslation::create( [
            'category_id'       => $category->id ,
            'locale'            => 'en',
            'title'              => 'Fish',
            'description'       => 'This is the description in English.',
            ]);

        CategoryTranslation::create([
                'category_id'   => $category->id ,
                'locale'        => 'ar',
                'title'         => 'سمك',
                'description'   => 'هذه هي وصف التذييل باللغة العربية.',
            ]);



            $category = Category::create([
                'image' => 'default.png',
            ]);

        CategoryTranslation::create( [
            'category_id'       => $category->id ,
            'locale'            => 'en',
            'title'              => 'Chicken',
            'description'       => 'This is the description in English.',
            ]);

        CategoryTranslation::create([
                'category_id'   => $category->id ,
                'locale'        => 'ar',
                'title'         => 'دجاج',
                'description'   => 'هذه هي وصف التذييل باللغة العربية.',
            ]);


            $category = Category::create([
                'image' => 'default.png',
            ]);

        CategoryTranslation::create( [
            'category_id'        => $category->id ,
            'locale'             => 'en',
            'title'              => 'Burger',
            'description'        => 'This is the description in English.',
            ]);

        CategoryTranslation::create([
                'category_id'   => $category->id ,
                'locale'        => 'ar',
                'title'         => 'برجر',
                'description'   => 'هذه هي وصف التذييل باللغة العربية.',
            ]);
    }
}
