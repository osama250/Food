<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BreadSeeder extends Seeder
{
    public function run()
    {

        $breads = [
            [
                'image' => 'b.jpg',
                'translations' => [
                    'en' => 'French Bread',
                    'ar' => 'خبز فرنسي',
                ],
            ],
            [
                'image' => 'b1.jpg',
                'translations' => [
                    'en' => 'Arabic Bread',
                    'ar' => 'خبز عربي',
                ],
            ],
            [
                'image' => 'b.jpg',
                'translations' => [
                    'en' => 'Toast Bread',
                    'ar' => 'خبز توست',
                ],
            ],
            [
                'image' => 'b1.jpg',
                'translations' => [
                    'en' => 'Sourdough Bread',
                    'ar' => 'خبز ساور دو',
                ],
            ],
        ];


        foreach ($breads as $bread) {
            $breadId = DB::table('breads')->insertGetId([
                'image'      => $bread['image'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            foreach ($bread['translations'] as $locale => $name) {
                DB::table('bread_translations')->insert([
                    'bread_id'   => $breadId,
                    'locale'     => $locale,
                    'name'       => $name,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
