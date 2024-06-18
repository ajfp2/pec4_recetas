<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userIds = User::pluck('id')->toArray();
        return [

            'nombre' => fake()->sentence(),
            'fecha' => fake()->dateTime(),
            'dificultad' =>  fake()->randomElement(['bajo','medio','alto']),
            'tiempo' => fake()->numberBetween(10, 240),
            'ingredientes' => fake()->text,            
            'instrucciones' => fake()->text,
            'imagen' => fake()->imageUrl(),
            'user_id' => fake()->randomElement($userIds)
        ];
    }
}
