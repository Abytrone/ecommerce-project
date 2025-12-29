<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'payment_method' => $this->faker->randomElement(['credit_card', 'paypal', 'stripe']),
            'transaction_id' => $this->faker->uuid(),
            'amount' => $this->faker->randomFloat(2, 10, 500),
            'currency' => 'usd',
            'status' => $this->faker->randomElement(['pending', 'success', 'failed']),
        ];
    }
}
