<?php

namespace Database\Factories\Dealer;

use App\Models\dealer;
use App\Models\noteDealer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class Note_dealerFactory extends Factory
{
    protected $model = noteDealer::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => fake()->text(100),
            'name' => fake()->realText(10),
            'IDDealer' => dealer::factory(),
        ];
    }
}
