<?php

namespace Database\Factories;

use App\Enums\Prefecture;
use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Group>
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
            'category_id' => 1,
            'name' => fake()->company,
            'description' => fake()->paragraph,
            'prefecture' => $this->faker->randomElement(Prefecture::cases()),
        ];
    }
}
