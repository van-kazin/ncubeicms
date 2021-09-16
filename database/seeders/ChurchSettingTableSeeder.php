<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ChurchSetting;

class ChurchSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      ChurchSetting::create([
         'church_name' => 'nCube Chapel Int.',
         'assembly_name' => 'Tema Assembly',
         'church_logo' => 'img/mh.jpg',
         'church_box_no' => 'P. O. Box CO 4334',
         'church_location' => 'Tema - Newtown',
         'church_phone' => '+233-000-000-000',
         'church_email' => 'admin@ncube.app',
         'church_website' => 'https://www.bravik.dev',
     ]);
    }
}
