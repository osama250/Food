<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Bread;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            SettingsTableSeeder::class,
            SettingTranslationsTableSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            AdminSeeder::class,
            CategorySeeder::class,
            RiceSeeder::class,
            BreadSeeder::class,
            DrinkSeeder::class,
            SaladSeeder::class,
            MealSeeder::class,
            DietplanSeeder::class
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
