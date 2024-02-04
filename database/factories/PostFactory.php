<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "title" => $this->faker->sentence(mt_rand(2, 8)),
            "slug" => $this->faker->sentence(mt_rand(2, 8)),
            "excerpt" => $this->faker->paragraph(),
            "body" => $this->faker->paragraph(mt_rand(5, 10)),
            "category_id" => $this->faker->numberBetween(1, 3),
            "user_id" => $this->faker->numberBetween(1, 10),
        ];
    }
}
