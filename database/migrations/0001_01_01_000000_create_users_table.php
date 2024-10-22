<?php
##O migration é uma maneira de definir a estrutura do banco de dados do nosso sistema, cada parte é responsável por uma parte do banco, que vou explicar mais a baixa
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    # o up é usado quando a migração é usada em outras palavras, executa o banco baseado nas tabelas feitas
    public function up(): void
    {
        ##Aqui estamos criando a tabela users, por padrão o laravel sempre busca o plural, e aqui definimos os campos, como nome, e-mail,etc.
        Schema::create('users', function (Blueprint $table) {## O blue print é usado para ter esse fluxo de criação das tabelas
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('avatar')->nullable();
            $table->unsignedTinyInteger('rating')->default(0);## o unsignedTinyInteger serve em resumo para valores pequeno
            $table->timestamps();## o timestamps é adiciona as colunas created_at e updated_at que fazem a parte de criaçaõ e atualização 
        });
        ## Agora o sessions é sobre informaçãoes da sessão do usuário
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }
     ## o down  é chamada quando a migração é revertida. Aqui, deleta as tabelas criadas se elas existirem.
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
