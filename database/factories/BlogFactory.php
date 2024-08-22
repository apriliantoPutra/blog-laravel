<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //ini aturan default factory
            'user_id'=> User::factory(), // menghubungkan dan juga membuat data random di tabel User(generate data sama, 10 users= 10 blogs)
            'judul_blog'=> fake()->sentence(),
            'category_id'=> Category::factory(),
            'isi_blog'=> fake()->text(),
            // 'isi-blog'=> fake()->paragraph()
        ];
    }
}
