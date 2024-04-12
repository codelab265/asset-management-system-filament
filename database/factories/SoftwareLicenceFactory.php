<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SoftwareLicence>
 */
class SoftwareLicenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'edition' => fake()->text(50),
            'version' => fake()->text(50),
            'os_build' => fake()->text(50),
            'experience' => fake()->text(50),

        ];
    }
}
