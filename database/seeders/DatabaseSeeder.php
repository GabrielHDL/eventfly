<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Storage::deleteDirectory('categories');
        Storage::deleteDirectory('events');
        Storage::makeDirectory('categories');
        Storage::makeDirectory('events');

        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        // $this->call(TicketSeeder::class);
        $this->call(SubcategorySeeder::class);
        $this->call(EventSeeder::class);
        $this->call(TicketSeeder::class);
    }
}
