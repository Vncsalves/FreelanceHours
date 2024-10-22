<?php
## a Factories também são chamadas de fabricas de modelos, aqui conseguimos alimentar com dados ficticios para teste ou encher o banco de dados 
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    
    
    public function definition(): array ## aqui é como vai ficar esse registros fakes
    {
        return [
            'name' => fake()->name(), ##o fake é usado assim para cria os nomes sem você ter dor de cabeça para pensar neles
            'email' => fake()->unique()->safeEmail(),## Aqui também, poderem temos o adicional de ser um e-mail único
            'rating'=> fake()->randomElement([1,2,3,4,5]),
            'avatar'=> 'https://avatar.iran.liara.run/public'
        ];
    }
}