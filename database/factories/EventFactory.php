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
            'content' => $this->faker->text(2000),
            'description' => $this->faker->text(120),
            'date' => $this->faker->randomElement(['mie 6 sep.', 'lun 2 ago.', 'vie 10 oct.', 'mie 30 feb.']),
            'location' => $this->faker->randomElement(['South Beach, Miami', 'Navojoa, Sonora', 'Expo Santa Fe México, CDMX', 'Foro Sol, CDMX']),
            'followers' => $this->faker->randomElement([800, 100, 500, 35, 730]),
            'price' => $this->faker->randomElement([19.99, 24.33, 15.99, 18.45]),
            'speaker' => $this->faker->randomElement(['Luis Briano', 'Gabriel Sánchez']),
        ];
    }
}
