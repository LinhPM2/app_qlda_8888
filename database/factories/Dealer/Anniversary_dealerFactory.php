<?php

namespace Database\Factories\Dealer;

use App\Models\anniversaryDealer;
use App\Models\dealer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class Anniversary_dealerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = anniversaryDealer::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'eventDate'=>fake()->date(),
            'name'=>'Ngày kỉ niệm',
            'IDDealer'=>dealer::factory(),
        ];
    }
}
