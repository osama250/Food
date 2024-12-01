<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('settings')->insert([
            'app_name'      => 'Food',
            'logo'          => 'logo.jpg',
            'footer_logo'   => 'logo.jpg',
            'location'      => 'Cairo, Egypt',
            'points_price'  => 100,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);
    }
}
