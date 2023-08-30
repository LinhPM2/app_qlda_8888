<?php

namespace Database\Factories\Dealer;

use App\Models\groupDealer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class Group_dealerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = groupDealer::class;
    public function definition(): array
    {
        return [
            'groupName'=>fake()->company(),
        ];
    }
}
