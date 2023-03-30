<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Branch>
 */
class BranchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $branchNames = ['Web Dev', 'Mob Dev', 'Data Science', 'Artificial Intelligence', 'Information Security'];
        
        return [
            'name' => fake()->unique()->randomElements($branchNames),
        ];
    }
}
