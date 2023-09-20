<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Tecnología',
                'slug' => Str::slug('Tecnología'),
            ],
            [
                'name' => 'Salud',
                'slug' => Str::slug('Salud'),
            ],
            [
                'name' => 'Deportes',
                'slug' => Str::slug('Deportes'),
            ],
            [
                'name' => 'Desarrollo Personal',
                'slug' => Str::slug('Desarrollo Personal'),
            ],
            [
                'name' => 'Aficiones',
                'slug' => Str::slug('Aficiones'),
            ],
            [
                'name' => 'Negocios',
                'slug' => Str::slug('Negocios'),
            ],
        ];

        foreach ($categories as $category) {
            $category = Category::factory(1)->create($category)->first();
        }
    }
}
