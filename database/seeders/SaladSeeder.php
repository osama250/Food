<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaladSeeder extends Seeder
{
    public function run()
    {

        $salads = [
            [
                'image' => 's.jpeg',
                'translations' => [
                    'en' => 'Caesar Salad',
                    'ar' => 'سلطة سيزر',
                ],
            ],
            [
                'image' => 'ss.jpg',
                'translations' => [
                    'en' => 'Greek Salad',
                    'ar' => 'سلطة يونانية',
                ],
            ],
            [
                'image' => 'sss.jpg',
                'translations' => [
                    'en' => 'Fattoush',
                    'ar' => 'فتوش',
                ],
            ],
            [
                'image' => 's.jpeg',
                'translations' => [
                    'en' => 'Tabbouleh',
                    'ar' => 'تبولة',
                ],
            ],
            [
                'image' => 'ss.jpg',
                'translations' => [
                    'en' => 'Mixed Salad',
                    'ar' => 'سلطة مشكلة',
                ],
            ],
            [
                'image' => 'sss.jpg',
                'translations' => [
                    'en' => 'Macaroni Salad',
                    'ar' => 'سلطة مكرونة',
                ],
            ],
        ];


        foreach ($salads as $salad) {
            $saladId = DB::table('salads')->insertGetId([
                'image'         => $salad['image'],
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);

            foreach ($salad['translations'] as $locale => $name) {
                DB::table('salad_translations')->insert([
                    'salad_id'       => $saladId,
                    'locale'         => $locale,
                    'name'           => $name,
                    'created_at'     => now(),
                    'updated_at'     => now(),
                ]);
            }
        }
    }
}
