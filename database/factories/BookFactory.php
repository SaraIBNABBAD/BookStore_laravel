<?php

namespace Database\Factories;

use App\Models\User as ModelsUser;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Auth\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'=>fake()->sentence(3),
            'author'=>fake()->name(),
            'description'=>fake()->paragraph(),
            'editionDate'=>fake()->date(),
            'picture'=>fake()->imageUrl(450,450,true),
            'user_id'=>User::where('role','admin')->get('id')->random(),
        ];
    }
}
