<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;

class superAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminUser = User::firstOrCreate(
            ['email' => 'admin-knight-ossis@yopmail.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('12345678'),
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        );
        if (!$adminUser->hasRole('superAdmin')) {
            $adminUser->assignRole('superAdmin');
        }
    }
}
