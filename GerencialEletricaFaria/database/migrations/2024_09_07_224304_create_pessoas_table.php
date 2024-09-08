<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('tipo')->comment('1 = Pessoa Física, 2 = Pessoa Jurídica');
            $table->string('cpf', 11)->nullable()->unique();
            $table->string('cnpj', 14)->nullable()->unique();
            $table->string('rg', 20)->nullable()->comment('Usado para Pessoa Física');
            $table->string('inscricao_estadual', 20)->nullable()->comment('Usado para Pessoa Jurídica');
            $table->string('nome')->nullable(false);
            $table->string('email')->nullable(false)->unique();
            $table->string('telefone', 15)->nullable();
            $table->date('data_nascimento')->nullable()->comment('Usado para Pessoa Física');
            $table->date('data_fundacao')->nullable()->comment('Usado para Pessoa Jurídica');
            $table->string('endereco')->nullable();
            $table->string('cidade')->nullable();
            $table->string('estado', 2)->nullable();
            $table->string('cep', 8)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pessoas');
    }
};
