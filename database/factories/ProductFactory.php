<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(100),
            'slug' => Str::slug($this->faker->text(20)),
            'content' => $this->faker->paragraph(),
            'price' => random_int(20000, 500000),
            'user_id' => User::all()->random()->id
        ];
    }
}
