<?php

namespace Database\Factories\Dealer;

use App\Models\dealer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\dealer>
 */
class DealerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = dealer::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'dealerName' => fake()->unique()->name(),
            'gender' => fake()->boolean(),
            'phoneNumber' => fake()->unique()->phoneNumber(),
            'dateOfBirth' => fake()->dateTimeBetween('-30 years', '-10 years'),
            'country' => fake()->country(),
            'specificAddress' => fake()->address(),
            'businessItem' => 'Hot Sauce Restaurant',
        ];
    }
}
