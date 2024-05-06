<?php

namespace Database\Factories;

use App\Enums\Prefecture;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company,
            'description' => fake()->paragraph,
            'prefecture' => $this->faker->randomElement(Prefecture::cases()),
            'city' => fake()->city,

        ];
    }
}
