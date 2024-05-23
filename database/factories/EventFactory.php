<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends Factory<Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        return [
            'group_id' => Group::factory(),
            'category_id' => $this->faker->numberBetween(1, 5),
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'location' => $this->faker->address,
            'event_date' => $this->faker->dateTimeBetween('+0 days', '+7 days')->format('Y-m-d'),
            'start_time' => $this->faker->time(), // Generates only the time
            'end_time' => $this->faker->time(),   // Generates only the time
            'max_participants' => $this->faker->numberBetween(10, 100),
            'participants' => $this->faker->numberBetween(0, 10),
        ];
    }
}
