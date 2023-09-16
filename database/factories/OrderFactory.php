<?php

namespace Database\Factories;

use App\Models\dealer;
use App\Models\Order;
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
    protected $model = Order::class;
    public function definition(): array
    {
        return [
            'IDDealer' => dealer::factory(),
            'unit' => 'bottle',
            'quantity' =>fake()->numberBetween(20, 300),
            'notes' =>fake()->paragraph(1),
        ];
    }
}
