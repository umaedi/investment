<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Responden>
 */
class RespondenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama'  => fake()->name(),
            'no_tlp'    => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
        ];
    }
}
