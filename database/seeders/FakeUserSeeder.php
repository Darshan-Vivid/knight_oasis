<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Carbon\Carbon;

class FakeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $totalUsers = 50;

        for ($i = 0; $i < $totalUsers; $i++) {
            $email = $faker->unique()->safeEmail;

            if (DB::table('users')->where('email', $email)->exists()) {
                continue;
            }

            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $email,
                'mobile' => $faker->phoneNumber,
                'state' => $faker->state,
                'country' => $faker->country,
                'password' => Hash::make('123456'),
                'email_verified_at' => (rand('0','9')%2) == 0  ? Carbon::now() : null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

        }

    }
}
