<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 10 dummy customers
        \App\Models\User::factory(10)->create()->each(function ($user) {
            // Assign some addresses
            \App\Models\Address::factory(rand(1, 2))->create(['user_id' => $user->id]);

            // Create some orders
            \App\Models\Order::factory(rand(1, 5))->create(['user_id' => $user->id])->each(function ($order) {
                // Create a transaction for the order
                \App\Models\Transaction::factory()->create([
                    'order_id' => $order->id,
                    'amount' => $order->total_price,
                    'status' => $order->status === 'cancelled' ? 'failed' : 'success',
                ]);
            });
        });
    }
}
