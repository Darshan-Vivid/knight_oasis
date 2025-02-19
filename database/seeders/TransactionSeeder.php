<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaction;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transections = 0;
        $count = 50;

        if ($count > $transections) {
            $remaining = 50 - $transections;
            Transaction::factory($remaining)->create();
        }
    }
}
