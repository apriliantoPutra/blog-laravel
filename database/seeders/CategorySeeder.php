<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Category::factory(3)->create()

        Category::create([
                'name'=> 'Web design',
                'slug'=> 'web-design',
                'color'=> 'blue'
            ]);
        Category::create([
                'name'=> 'UI UX',
                'slug'=> 'ui-ux',
                'color'=> 'yellow'
            ]);
        Category::create([
                'name'=> 'Data Analyst',
                'slug'=> 'data-analyst',
                'color'=> 'green'
            ]);
        Category::create([
                'name'=> 'Cyber Security',
                'slug'=> 'cyber-security',
                'color'=> 'red'
            ]);
    }
}
