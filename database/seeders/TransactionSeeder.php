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
        $count = Transaction::count();

        if ($count < 50) {
            $remaining = 50 - $count;
            Transaction::factory($remaining)->create();
        }
    }
}
