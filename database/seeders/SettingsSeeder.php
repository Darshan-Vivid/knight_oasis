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
            ['slug' => 'site_logo', 'value' => 'null'],
            ['slug' => 'logo_text', 'value' => 'null'],
            ['slug' => 'site_title', 'value' => 'null'],
            ['slug' => 'admin_address', 'value' => 'null'],
            ['slug' => 'admin_phone', 'value' => 'null'],
            ['slug' => 'admin_email', 'value' => 'null'],
            ['slug' => 'site_copyright_text', 'value' => 'null'],
            ['slug' => 'site_social_links', 'value' => 'null'],
        ];

        foreach ($data as $item) {
            if (!DB::table('settings')->where('slug', $item['slug'])->exists()) {
                DB::table('settings')->insert($item);
            }
        }
    }
}
