<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;

class Pessoa extends Model
{
    protected $fillable = [
        'tipo', 
        'cpf', 
        'cnpj', 
        'rg', 
        'inscricao_estadual', 
        'nome', 
        'email', 
        'telefone', 
        'data_nascimento', 
        'data_fundacao', 
        'endereco', 
        'cidade', 
        'estado', 
        'cep'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($pessoa) {
            if ($pessoa->tipo == 1) {
                if (is_null($pessoa->cpf) || is_null($pessoa->rg) || !is_null($pessoa->cnpj) || !is_null($pessoa->inscricao_estadual)) {
                    throw ValidationException::withMessages(['type' => 'Para Pessoa Física, CPF e RG devem ser preenchidos, e CNPJ e Inscrição Estadual devem ser nulos.']);
                }
            } elseif ($pessoa->tipo == 2) {
                if (is_null($pessoa->cnpj) || is_null($pessoa->inscricao_estadual) || !is_null($pessoa->cpf) || !is_null($pessoa->rg)) {
                    throw ValidationException::withMessages(['type' => 'Para Pessoa Jurídica, CNPJ e Inscrição Estadual devem ser preenchidos, e CPF e RG devem ser nulos.']);
                }
            } else {
                throw ValidationException::withMessages(['type' => 'Tipo inválido.']);
            }
        });
    }
}
