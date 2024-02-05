<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // cara Database Factory
        User::factory(10)->create();

        Category::create([
            'name' => 'Machine Learning',
            'slug' => 'machine-learning'
        ]);
        Category::create([
            'name' => 'Data Science',
            'slug' => 'data-science'
        ]);
        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);
        Category::create([
            'name' => 'Research',
            'slug' => 'research'
        ]);

        Post::factory(25)->create();
    }
}
