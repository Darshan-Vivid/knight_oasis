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
            ['name'=>'Site icon','slug' => 'site_icon', 'value' => 'https://cdn-icons-png.freepik.com/512/6660/6660308.png' ,"type"=>"img"],
            ['name'=>'Site light logo','slug' => 'site_logo_light', 'value' => 'https://cdn-icons-png.freepik.com/512/6660/6660308.png' ,"type"=>"img"],
            ['name'=>'Site dark logo','slug' => 'site_logo_dark', 'value' => 'https://cdn-icons-png.freepik.com/512/6660/6660308.png' ,"type"=>"img"],
            ['name'=>'Site logo text','slug' => 'logo_text', 'value' => 'null',"type"=>"text"],
            ['name'=>'Site title','slug' => 'site_title', 'value' => 'null',"type"=>"text"],
            ['name'=>'Site Social link','slug' => 'site_social_links', 'value' => '[]',"type"=>"social"],
            ['name'=>'Site copyright text','slug' => 'site_copyright_text', 'value' => 'null',"type"=>"text"],
            ['name'=>'Admin address','slug' => 'admin_address', 'value' => 'null',"type"=>"text"],
            ['name'=>'Admin phone','slug' => 'admin_phone', 'value' => 'null',"type"=>"text"],
            ['name'=>'Admin email','slug' => 'admin_email', 'value' => 'null',"type"=>"text"],
            ['name'=>'Hotel Location Link','slug' => 'map_link', 'value' => 'null',"type"=>"map_link"],
            ['name'=>'Hotel surroundings','slug' => 'hotel_surroundings', 'value' => 'null',"type"=>"textarea"],
            ['name'=>'Hotel Rules','slug' => 'hotel_rules', 'value' => 'null',"type"=>"textarea"],
        ];

        foreach ($data as $item) {
            if (!DB::table('settings')->where('slug', $item['slug'])->exists()) {
                DB::table('settings')->insert($item);
            }
            if(DB::table('settings')->where('slug', $item['slug'])->first()->name != $item['name']){
                DB::table('settings')->where('slug', $item['slug'])->update(['name'=>$item['name']]);
            }
        }

        if(DB::table('settings')->where('slug', 'site_logo')->exists()){
            DB::table('settings')->where('slug', 'site_logo')->delete();
        }
    }
}
