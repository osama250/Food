<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RiceSeeder extends Seeder
{
    public function run()
    {

        $rices = [
            [
                'image' => 'r.jpg',
                'translations' => [
                    'en' => 'Basmati Rice',
                    'ar' => 'أرز بسمتي',
                ],
            ],
            [
                'image' => 'r.jpg',
                'translations' => [
                    'en' => 'Egyptian Rice',
                    'ar' => 'أرز مصري',
                ],
            ],
            [
                'image' => 'r.jpg',
                'translations' => [
                    'en' => 'Jasmine Rice',
                    'ar' => 'أرز جاسمين',
                ],
            ],
        ];


        foreach ($rices as $rice) {
            $riceId = DB::table('rices')->insertGetId([
                'image'      => $rice['image'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            foreach ($rice['translations'] as $locale => $name) {
                DB::table('rice_translations')->insert([
                    'rice_id'    => $riceId,
                    'locale'     => $locale,
                    'name'       => $name,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
