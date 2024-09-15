<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model // Ajuste o nome da classe para Funcionario
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'funcionarios'; // Tabela correta
    protected $primaryKey = 'id_funcionario';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nome',
        'cpf',
        'rg',
        'telefone',
        'email',
        'data_contratacao',
        'cargo',
        'salario',
    ];

    protected $casts = [
        // Adicione aqui se necessário
    ];
    
}
