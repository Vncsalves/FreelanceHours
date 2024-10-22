# FreelanceHours

Este repositório é dedicado ao meu projeto **FreelanceHours**, que estou utilizando para aprender a utilizar o framework Laravel.

## Sumário

- [Objetivo](#objetivo)
- [Como Rodar o Projeto](#como-rodar-o-projeto)
- [Materiais de Estudo](#materiais-de-estudo)
  - [Migration](#migration)
  - [Factories](#factories)
  - [Seeders](#seeders)
- [Funcionalidades Planejadas](#funcionalidades-planejadas)
- [Contribuições](#contribuições)
- [Contato](#contato)

## Objetivo 💡

O objetivo central desse projeto é aprender os conceitos básicos do lávarel, utilizando ele como uma forma de caderno de anotações mostrando tudo que aprendi até o momento.

O sistema em si se trata de uma site de freelancer no qual o usuário coloca sua projeto/necessidade e os Devs proproem em quanto tempo conseguem realizar o projeto, assim a aquele que ficar em primeiro com a menor quantiadade de horas para desenvolver, ganha o projeto

Até o momento o foca está no banco, aprendendo diversos conceitos e posteriomente vamos para as rotas e componentes com LiveWire

## Como Rodar o Projeto ♻

Para rodar o projeto, você pode usar o Herd, que facilita a instalação do PHP e do ambiente Laravel. Siga os passos abaixo:

1. Certifique-se de ter o Herd instalado no seu sistema.
2. Navegue até a pasta do seu projeto no terminal.
3. Execute o comando:

    ```bash
    php artisan serve
    ```

Isso iniciará a aplicação em [http://localhost:8000](http://localhost:8000).

## Materiais de Estudo 📘

Atualmente, estou focado na parte de banco de dados do Laravel. Aqui estão alguns dos tópicos que estou estudando:

- **Migration**: Aprender a criar e gerenciar a estrutura do banco de dados usando migrações do Laravel, uma forma muito simples de criar a estrutura.

    ```php
    <?php
    ## O migration é uma maneira de definir a estrutura do banco de dados do nosso sistema, cada parte é responsável por uma parte do banco.
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        ## O up é usado quando a migração é executada, ou seja, cria as tabelas no banco.
        public function up(): void
        {
            ## Aqui estamos criando a tabela users, por padrão o Laravel sempre busca o plural, e aqui definimos os campos.
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email')->unique();
                $table->string('avatar')->nullable();
                $table->unsignedTinyInteger('rating')->default(0); ## O unsignedTinyInteger serve para valores pequenos.
                $table->timestamps(); ## Adiciona as colunas created_at e updated_at.
            });

            ## Agora a tabela sessions armazena informações da sessão do usuário.
            Schema::create('sessions', function (Blueprint $table) {
                $table->string('id')->primary();
                $table->foreignId('user_id')->nullable()->index();
                $table->string('ip_address', 45)->nullable();
                $table->text('user_agent')->nullable();
                $table->longText('payload');
                $table->integer('last_activity')->index();
            });
        }

        ## O down é chamado quando a migração é revertida. Aqui, deleta as tabelas criadas se elas existirem.
        public function down(): void
        {
            Schema::dropIfExists('users');
            Schema::dropIfExists('sessions');
        }
    };
    ```

- **Factories**: Usamos na criação dos preenchimentos dos bancos, onde definimos o que será recebido, como um nome fake.

    ```php
    <?php
    ## As Factories são chamadas de fábricas de modelos, aqui conseguimos alimentar com dados fictícios para teste.
    namespace Database\Factories;

    use Illuminate\Database\Eloquent\Factories\Factory;

    class UserFactory extends Factory
    {
        ## Define como serão os registros fakes
        public function definition(): array
        {
            return [
                'name' => fake()->name(), ## O fake é usado assim para criar nomes sem você ter dor de cabeça para pensar neles.
                'email' => fake()->unique()->safeEmail(), ## Aqui também, podemos ter o adicional de ser um e-mail único.
                'rating' => fake()->randomElement([1, 2, 3, 4, 5]), ## Gera uma nota aleatória.
                'avatar' => 'https://avatar.iran.liara.run/public' ## URL de avatar padrão.
            ];
        }
    }
    ```

- **Seeders**: Quando aplicamos aquilo que foi feito nas Factories, usando para criar instâncias no banco.

    ```php
    <?php
    namespace Database\Seeders;

    use App\Models\User;
    use App\Models\Project; // Importa a classe Project
    use App\Models\Proposal; // Importa a classe Proposal
    use Illuminate\Database\Seeder;

    class DatabaseSeeder extends Seeder
    {
        /**
         * Popula o banco de dados com dados fictícios.
         */
        public function run(): void
        {
            // Cria 247 usuários fictícios
            User::factory()
                ->count(247)
                ->create();

            // Seleciona 10 usuários aleatórios e cria projetos e propostas para eles
            User::query()->inRandomOrder()->limit(10)->get()
                ->each(function (User $u) {
                    // Cria um projeto para o usuário
                    $project = Project::factory()->create(['created_by' => $u->id]);

                    // Cria propostas para o projeto
                    Proposal::factory()
                        ->count(random_int(4, 45)) // Gera um número aleatório de propostas
                        ->create(['project_id' => $project->id]); // Cria as propostas ligadas ao projeto
                });
        }
    }
    ```

## Funcionalidades Planejadas ⚙

A aplicação FreelanceHours permitirá que os usuários:

- Criar solicitações de trabalho.
- Propor suas horas de trabalho.
- Enviar E-mails para mostrar sua posição no ranking de freelancer.

## Contribuições 👨‍👩‍👦‍👦

Contribuições são bem-vindas! Como é meu primeiro contato com o framework, está sendo um desafio e é diferente de tudo que já vi, então estou aberto a contribuições e ensinamentos.

## Contato 🏳

Para qualquer dúvida ou sugestão, você pode me encontrar em vncsalves2278@gmail.com ou em meu Instagram Vncs_as.

---

Este README será atualizado à medida que eu fizer progressos nos meus estudos e no desenvolvimento da aplicação. Fique à vontade para acompanhar!
