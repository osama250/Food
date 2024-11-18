<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{

    public function run()
    {
        $admin = User::create([
            'name'      => 'Super Admin',
            'email'     => 'admin@gmail.com',
            'password'  => 'password',
        ]);
        $admin->assignRole('superadmin');
    }
}
