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


    public function definition(): array
    {
        // Generate a start time
        $startTime = $this->faker->dateTimeBetween('08:00:00', '17:00:00');

        // Clone the startTime DateTime object and add a random duration to it for the end time
        $endTime = (clone $startTime)->modify('+'.rand(1, 4).' hours');

        return [
            'group_id' => Group::factory(),
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'location' => $this->faker->address,
            'event_date' => $this->faker->dateTimeBetween('+0 days', '+7 days')->format('Y-m-d'),
            'start_time' => $startTime->format('H:i'), // Format the DateTime object to a time string
            'end_time' => $endTime->format('H:i'),
            'participants' => $this->faker->numberBetween(1, 30),
        ];
    }
}
