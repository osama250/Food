<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{

    public function run(): void
    {
        $permissions = [
            'View Admins',
            'Create Admins',
            'Edit Admins',
            'Update Admins',
            'Delete Admins',
            'View Roles',
            'Create Roles',
            'Update Roles',
            'Delete Roles',
            'Edit Setting',
            'View Category',
            'Create Category',
            'Update Category',
            'Delete Category',
            'View Rice',
            'Create Rice',
            'Update Rice',
            'Delete Rice',
            'View Bread',
            'Create Bread',
            'Update Bread',
            'Delete Bread',
            'View Drink',
            'Create Drink',
            'Update Drink',
            'Delete Drink',
            'View Salad',
            'Create Salad',
            'Update Salad',
            'Delete Salad',
            'View Contact',
            'Create Contact',
            'Update Contact',
            'Delete Contact',
            'View Contact-Us',
            'Create Contact-Us',
            'Update Contact-Us',
            'Delete Contact-Us',

        ];
        foreach ($permissions as $permission) {
            \Spatie\Permission\Models\Permission::updateOrCreate( [ 'name' => $permission ] );
        }


    }
}
