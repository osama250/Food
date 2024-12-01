<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MealSeeder extends Seeder
{
    public function run()
    {
        $meals = [
            [
                'image'             => 'm.jpg',
                'price'             => 50,
                'category_id'       => 1,
                'salad_id'          => 1,
                'rice_id'           => 1,
                'drink_id'          => 1,
                'bread_id'          => 1,
                'diabetes'          => true,
                'hypertension'      => false,
                'heart_disease'     => true,
                'asthma'            => false,
                'cancer'            => false,
                'translations' => [
                    'en' => [
                        'name'          => 'Grilled Chicken Meal',
                        'description'   => 'A healthy grilled chicken meal with rice, bread, and a salad.'
                    ],
                    'ar' => [
                        'name'           => 'وجبة دجاج مشوي',
                        'description'    => 'وجبة دجاج مشوي صحية مع الأرز، الخبز، والسلطة.'
                    ]
                ]
            ],
            [
                'image'          => 'mm.jpg',
                'price'          => 40,
                'category_id'    => 2,
                'salad_id'       => 2,
                'rice_id'        => 2,
                'drink_id'       => 2,
                'bread_id'       => 2,
                'diabetes'       => false,
                'hypertension'   => true,
                'heart_disease'  => false,
                'asthma'         => true,
                'cancer'         => false,
                'translations' => [
                    'en' => [
                        'name'          => 'Vegetarian Meal',
                        'description'   => 'A healthy vegetarian meal with rice, bread, and a fresh salad.'
                    ],
                    'ar' => [
                        'name'          => 'وجبة نباتية',
                        'description'   => 'وجبة نباتية صحية مع الأرز، الخبز، وسلطة طازجة.'
                    ]
                ]
            ],
            [
                'image'          => 'mmm.jpg',
                'price'          => 60,
                'category_id'    => 3,
                'salad_id'       => 3,
                'rice_id'        => 3,
                'drink_id'       => 3,
                'bread_id'       => 3,
                'diabetes'       => false,
                'hypertension'   => false,
                'heart_disease'  => true,
                'asthma'         => false,
                'cancer'         => true,
                'translations' => [
                    'en' => [
                        'name'              => 'Beef Steak Meal',
                        'description'       => 'A delicious beef steak meal served with rice,
                                                    bread, and a refreshing drink.'
                    ],
                    'ar' => [
                        'name'              => 'وجبة ستيك لحم بقر',
                        'description'       => 'وجبة ستيك لحم بقر لذيذة مع الأرز، الخبز، والمشروب المنعش.'
                    ]
                ]
            ],
        ];


        foreach ($meals as $meal) {
            $mealId = DB::table('meals')->insertGetId([
                'image'         => $meal['image'],
                'price'         => $meal['price'],
                'category_id'   => $meal['category_id'],
                'salad_id'      => $meal['salad_id'],
                'rice_id'       => $meal['rice_id'],
                'drink_id'      => $meal['drink_id'],
                'bread_id'      => $meal['bread_id'],
                'diabetes'      => $meal['diabetes'],
                'hypertension'  => $meal['hypertension'],
                'heart_disease' => $meal['heart_disease'],
                'asthma'        => $meal['asthma'],
                'cancer'        => $meal['cancer'],
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);

            foreach ($meal['translations'] as $locale => $translation) {
                DB::table('meal_translations')->insert([
                    'meal_id'       => $mealId,
                    'locale'        => $locale,
                    'name'          => $translation['name'],
                    'description'   => $translation['description'],
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ]);
            }
        }
    }
}
