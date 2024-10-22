<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition(): array
    {
        return [
            'title' => implode(' ', fake()->words(5)),
            'description' => fake()->paragraph(),
            'ends_at' => fake()->dateTimeBetween('now', '+3 days'),
            'status' => fake()->randomElement(['open', 'closed']),
            'tech_stack' => fake()->randomElement(['react', 'php', 'laravel', 'vue', 'tailwindcss', 'js', 'nextjs', 'python'], random_int(1, 5)),
            'created_by' => User::factory(), 
        ];
    }
}
