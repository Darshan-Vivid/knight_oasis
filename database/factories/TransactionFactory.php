<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    public function definition()
    {
        return [
            'amount' => $this->faker->numberBetween(1, 10000), 
            'method' => Arr::random(['CASHFREE', 'UPI', 'CASH', 'PAYUMONEY','DEBIT CARD',"CREDIT CARD"]), 
            'status' => $this->faker->randomElement(['0', '1']),
            'transaction_id' => $this->faker->unique()->uuid,
        ];
    }
}
