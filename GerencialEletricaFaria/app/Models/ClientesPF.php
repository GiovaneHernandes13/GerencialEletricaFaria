<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientesPF extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_cliente_pf',
        'nome',
        'cpf',
        'rg',
        'telefone',
        'email',
        'endereco',
        'data_nascimento',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */

}
