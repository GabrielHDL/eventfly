<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subcategories = [
            [
                'category_id' => 1,
                'name' => 'Inteligencia Artificial',
                'slug' => Str::slug('Inteligencia Artificial')
            ],
            [
                'category_id' => 1,
                'name' => 'Big Data',
                'slug' => Str::slug('Big Data')
            ],
            [
                'category_id' => 2,
                'name' => 'Alimentación',
                'slug' => Str::slug('Alimentación')
            ],
            [
                'category_id' => 2,
                'name' => 'Gimnasio',
                'slug' => Str::slug('Gimnasio')
            ],
            [
                'category_id' => 3,
                'name' => 'Futbol',
                'slug' => Str::slug('Futbol')
            ],
            [
                'category_id' => 3,
                'name' => 'Autos',
                'slug' => Str::slug('Autos')
            ],
            [
                'category_id' => 4,
                'name' => 'Superación Personal',
                'slug' => Str::slug('Superación Personal')
            ],
            [
                'category_id' => 4,
                'name' => 'Habitos',
                'slug' => Str::slug('Habitos')
            ],
            [
                'category_id' => 5,
                'name' => 'Club Chivas',
                'slug' => Str::slug('Club Chivas')
            ],
            [
                'category_id' => 5,
                'name' => 'Club Aguilas',
                'slug' => Str::slug('Club Aguilas')
            ],
            [
                'category_id' => 6,
                'name' => 'Marketing Digital',
                'slug' => Str::slug('Marketing Digital')
            ],
            [
                'category_id' => 6,
                'name' => 'Google Business',
                'slug' => Str::slug('Google Business')
            ],
        ];

        foreach ($subcategories as $subcategory) {
            Subcategory::create($subcategory);
        }
    }
}
