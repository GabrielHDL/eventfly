<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::factory(40)->create()->each(function(Event $event) {
            Image::factory(2)->create([
                'imageable_id' => $event->id,
                'imageable_type' => Event::class,
            ]);
        });
    }
}
