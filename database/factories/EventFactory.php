<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
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
        $name = $this->faker->sentence(2);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'content' => $this->faker->text(800),
            'description' => $this->faker->text(120),
            'followers' => $this->faker->randomElement([800, 100, 500, 35, 730]),
            'speaker' => $this->faker->randomElement(['Luis Briano', 'Gabriel Sánchez']),
        ];
    }
}
