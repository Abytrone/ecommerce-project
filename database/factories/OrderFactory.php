<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number' => 'OR-' . $this->faker->unique()->numberBetween(100000, 999999),
            'status' => $this->faker->randomElement(['pending', 'processing', 'shipped', 'delivered', 'cancelled']),
            'currency' => 'usd',
            'total_price' => $this->faker->randomFloat(2, 10, 500),
            'shipping_price' => $this->faker->randomFloat(2, 5, 20),
            'shipping_method' => $this->faker->randomElement(['Standard', 'Express', 'Next Day']),
            'notes' => $this->faker->sentence(),
        ];
    }
}
