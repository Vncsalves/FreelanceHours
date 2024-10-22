<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Project; // Importa a classe Project
use App\Models\Proposal; // Não esqueça de importar a classe Proposal
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Cria 247 usuários fictícios
        User::factory() // Chama a fábrica de usuários que definimos anteriormente.
            ->count(247) // Especifica que devem ser criados 247 usuários.
            ->create(); // Cria os usuários.

        // Seleciona 10 usuários aleatórios e cria projetos e propostas para eles
        User::query()->inRandomOrder()->limit(10)->get()
            ->each(function (User $u) {
                $project = Project::factory()->create(['created_by' => $u->id]); 

                Proposal::factory()
                    ->count(random_int(4, 45)) // Cria um número aleatório de propostas
                    ->create(['project_id' => $project->id]); // Cria as propostas com ligação ao projeto
            });
    }
}
