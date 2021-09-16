<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $permission =  permission::create([
          'name' => 'Create User',
      ]);
      $permission =  permission::create([
          'name' => 'Edit User',
      ]);
      $permission =  permission::create([
          'name' => 'Delete User',
      ]);
      $permission =  permission::create([
          'name' => 'Raed User',
      ]);
      $permission =  permission::create([
          'name' => 'Create Department',
      ]);
      $permission =  permission::create([
          'name' => 'Read Department',
      ]);
      $permission =  permission::create([
          'name' => 'Delete Department',
      ]);
      $permission =  permission::create([
          'name' => 'Edit Department',
      ]);
    }
}
