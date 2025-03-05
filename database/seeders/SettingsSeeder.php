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
            ['page' => 'general', "type" => "img", 'name' => 'Site icon', 'slug' => 'site_icon', 'value' => 'https://cdn-icons-png.freepik.com/512/6660/6660308.png'],
            ['page' => 'general', "type" => "img", 'name' => 'Site light logo', 'slug' => 'site_logo_light', 'value' => 'https://cdn-icons-png.freepik.com/512/6660/6660308.png'],
            ['page' => 'general', "type" => "img", 'name' => 'Site dark logo', 'slug' => 'site_logo_dark', 'value' => 'https://cdn-icons-png.freepik.com/512/6660/6660308.png'],
            ['page' => 'general', "type" => "text", 'name' => 'Site logo text', 'slug' => 'logo_text', 'value' => 'null'],
            ['page' => 'general', "type" => "text", 'name' => 'Site title', 'slug' => 'site_title', 'value' => 'null'],
            ['page' => 'general', "type" => "social", 'name' => 'Site Social link', 'slug' => 'site_social_links', 'value' => '[]'],
            ['page' => 'general', "type" => "text", 'name' => 'Site copyright text', 'slug' => 'site_copyright_text', 'value' => 'null'],
            ['page' => 'general', "type" => "text", 'name' => 'Admin address', 'slug' => 'admin_address', 'value' => 'null'],
            ['page' => 'general', "type" => "text", 'name' => 'Admin phone', 'slug' => 'admin_phone', 'value' => 'null'],
            ['page' => 'general', "type" => "text", 'name' => 'Admin email', 'slug' => 'admin_email', 'value' => 'null'],
            ['page' => 'general', "type" => "map_link", 'name' => 'Hotel Location Link', 'slug' => 'map_link', 'value' => 'null'],
            ['page' => 'general', "type" => "textarea", 'name' => 'Hotel surroundings', 'slug' => 'hotel_surroundings', 'value' => 'null'],
            ['page' => 'general', "type" => "textarea", 'name' => 'Hotel Rules', 'slug' => 'hotel_rules', 'value' => 'null'],
            ['page' => 'about',   "type" => "text", 'name' => 'Welcome title', 'slug' => 'about_welcome_title', 'value' => 'null'],
            ['page' => 'about',   "type" => "textarea", 'name' => 'Welcome description', 'slug' => 'about_welcome_description', 'value' => 'null'],
            ['page' => 'about',   "type" => "img", 'name' => 'Welcome Image 1', 'slug' => 'about_welcome_img_1', 'value' => 'null'],
            ['page' => 'about',   "type" => "img", 'name' => 'Welcome Image 2', 'slug' => 'about_welcome_img_2', 'value' => 'null'],
            ['page' => 'about',   "type" => "text", 'name' => 'Welcome Counter 1 count', 'slug' => 'about_welcome_counter_count_1', 'value' => 'null'],
            ['page' => 'about',   "type" => "text", 'name' => 'Welcome Counter 1 text', 'slug' => 'about_welcome_counter_text_1', 'value' => 'null'],
            ['page' => 'about',   "type" => "text", 'name' => 'Welcome Counter 2 count', 'slug' => 'about_welcome_counter_count_2', 'value' => 'null'],
            ['page' => 'about',   "type" => "text", 'name' => 'Welcome Counter 2 text', 'slug' => 'about_welcome_counter_text_2', 'value' => 'null'],
            ['page' => 'about',   "type" => "json", 'name' => 'Amenities', 'slug' => 'about_amenities', 'value' => '[]'],
            ['page' => 'about',   "type" => "img", 'name' => 'Amenity image 1', 'slug' => 'about_amenity_img_1', 'value' => 'null'],
            ['page' => 'about',   "type" => "img", 'name' => 'Amenity image 2', 'slug' => 'about_amenity_img_2', 'value' => 'null'],
        ];

        foreach ($data as $item) {
            if (!DB::table('settings')->where('slug', $item['slug'])->exists()) {
                DB::table('settings')->insert($item);
            }
            if (DB::table('settings')->where('slug', $item['slug'])->first()->name != $item['name']) {
                DB::table('settings')->where('slug', $item['slug'])->update(['name' => $item['name']]);
            }
            if (DB::table('settings')->where('slug', $item['slug'])->first()->page != $item['page']) {
                DB::table('settings')->where('slug', $item['slug'])->update(['page' => $item['page']]);
            }
            if (DB::table('settings')->where('slug', $item['slug'])->first()->type != $item['type']) {
                DB::table('settings')->where('slug', $item['slug'])->update(['type' => $item['type']]);
            }

        }

        if (DB::table('settings')->where('slug', 'site_logo')->exists()) {
            DB::table('settings')->where('slug', 'site_logo')->delete();
        }
    }
}
