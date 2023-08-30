<?php

namespace Database\Factories\Dealer;

use App\Models\dealer;
use App\Models\otherContact;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class otherContact_dealerFactory extends Factory
{
    protected $model = otherContact::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fullName'=>fake()->name(),
            'dateOfBirth'=>fake()->dateTimeBetween('-30 years', '-10 years'),
            'gender'=>fake()->boolean(),
            'phoneNumber'=>fake()->phoneNumber(),
            'IDDealer'=>dealer::factory(),
        ];
    }
}
