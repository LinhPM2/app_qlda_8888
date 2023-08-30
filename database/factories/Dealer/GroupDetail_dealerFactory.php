<?php

namespace Database\Factories\Dealer;

use App\Models\dealer;
use App\Models\groupDealer;
use App\Models\groupDetailDealer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class GroupDetail_dealerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = groupDetailDealer::class;
    public function definition(): array
    {
        return [
            'IDDealer' => dealer::factory(),
            'IDGroup' => groupDealer::factory(),
        ];
    }
}
