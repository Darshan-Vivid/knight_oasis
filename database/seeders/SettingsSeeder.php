<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['slug' => 'site_icon', 'value' => 'https://cdn-icons-png.freepik.com/512/6660/6660308.png' ,"type"=>"img"],
            ['slug' => 'site_logo_light', 'value' => 'https://cdn-icons-png.freepik.com/512/6660/6660308.png' ,"type"=>"img"],
            ['slug' => 'site_logo_dark', 'value' => 'https://cdn-icons-png.freepik.com/512/6660/6660308.png' ,"type"=>"img"],
            ['slug' => 'logo_text', 'value' => 'null',"type"=>"text"],
            ['slug' => 'site_title', 'value' => 'null',"type"=>"text"],
            ['slug' => 'admin_address', 'value' => 'null',"type"=>"text"],
            ['slug' => 'admin_phone', 'value' => 'null',"type"=>"text"],
            ['slug' => 'admin_email', 'value' => 'null',"type"=>"text"],
            ['slug' => 'site_copyright_text', 'value' => 'null',"type"=>"text"],
            ['slug' => 'site_social_links', 'value' => '[]',"type"=>"social"],
        ];

        foreach ($data as $item) {
            if (!DB::table('settings')->where('slug', $item['slug'])->exists()) {
                DB::table('settings')->insert($item);
            }
        }

        if(DB::table('settings')->where('slug', 'site_logo')->exists()){
            DB::table('settings')->where('slug', 'site_logo')->delete();
        }
    }
}
