<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    public function definition()
    {
        return [
            'amount' => $this->faker->numberBetween(1, 10000), // Generates random amounts
            'transaction_id' => $this->faker->unique()->uuid, // Unique transaction ID
            'status' => $this->faker->randomElement(['0', '1']), // Random status: 0 (cancel) or 1 (paid)
        ];
    }
}
