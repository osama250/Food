<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DrinkSeeder extends Seeder
{
    public function run()
    {

        $drinks = [
            [
                'image' => 'd.jpeg',
                'translations' => [
                    'en' => 'Coca Cola',
                    'ar' => 'كوكا كولا',
                ],
            ],
            [
                'image' => 'dd.jpg',
                'translations' => [
                    'en' => 'Pepsi',
                    'ar' => 'بيبسي',
                ],
            ],
            [
                'image' => 'ddd.jpg',
                'translations' => [
                    'en' => 'Orange Juice',
                    'ar' => 'عصير برتقال',
                ],
            ],
            [
                'image' => 'd.jpeg',
                'translations' => [
                    'en' => 'Coffee',
                    'ar' => 'قهوة',
                ],
            ],
            [
                'image' => 'dd.jpg',
                'translations' => [
                    'en' => 'Tea',
                    'ar' => 'شاي',
                ],
            ],
            [
                'image' => 'ddd.jpg',
                'translations' => [
                    'en' => 'Water',
                    'ar' => 'ماء',
                ],
            ],
        ];


        foreach ($drinks as $drink) {
            $drinkId = DB::table('drinks')->insertGetId([
                'image'             => $drink['image'],
                'created_at'        => now(),
                'updated_at'        => now(),
            ]);

            foreach ($drink['translations'] as $locale => $name) {
                DB::table('drink_translations')->insert([
                    'drink_id'   => $drinkId,
                    'locale'     => $locale,
                    'name'       => $name,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
