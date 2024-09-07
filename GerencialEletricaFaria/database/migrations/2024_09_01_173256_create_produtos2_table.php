<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('produtos2', function (Blueprint $table) {
            $table->increments('id_produto'); // Define a coluna `id_produto` como chave primária e auto-incremento
            $table->string('nome_produto', 100)->nullable(); // Coluna `nome_produto` do tipo varchar(100)
            $table->text('descricao')->nullable(); // Coluna `descricao` do tipo text
            $table->decimal('preco', 10, 2)->nullable(); // Coluna `preco` do tipo decimal(10,2)
            $table->integer('estoque')->nullable(); // Coluna `estoque` do tipo int(11)
            $table->string('nova_coluna', 255)->nullable(); // Coluna `nova_coluna` do tipo varchar(255)
            $table->timestamps(); // Adiciona as colunas `created_at` e `updated_at` automaticamente
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
