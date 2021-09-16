<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use App\Models\Profile;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = User::where('email', 'nana@queen.me')->first();

     if (!$user) {
       $user =  User::create([
             'name' => 'nCube Admin',
             'role' => 'Admin',
             'email' => 'admin@ncube.app',
             'password' => bcrypt('password')
         ]);
     }

     Profile::create([
         'user_id' => $user->id,
         'avatar' => 'img/rev.jpeg',
         'phone' => '000-0000-000',
         'dob' => '00-00-0000',
         'about' => 'Thats about me Jharee',
     ]);
    }
}
