<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Subcategory;
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

        $subcategory = Subcategory::all()->random();

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'content' => $this->faker->text(2000),
            'description' => $this->faker->text(120),
            'date' => $this->faker->randomElement(['20-09-2023', '27-09-2023', '02-10-2023', '13-12-2023']),
            'location' => $this->faker->randomElement(['South Beach, Miami', 'Navojoa, Sonora', 'Expo Santa Fe México, CDMX', 'Foro Sol, CDMX']),
            'attendees' => $this->faker->randomElement([800, 100, 500, 35, 730]),
            'price' => $this->faker->randomElement([19.99, 24.33, 15.99, 18.45]),
            'quantity' => 15,
            'subcategory_id' => $subcategory->id,
            'speaker' => $this->faker->randomElement(['Luis Briano', 'Gabriel Sánchez']),
            'status' => $this->faker->randomElement([Event::PUBLISHED, Event::DRAFT])
        ];
    }
}
