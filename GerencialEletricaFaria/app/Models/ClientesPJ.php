<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientesPJ extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_cliente_pf',
        'razao_social',
        'cnpj',
        'rg',
        'telefone',
        'email',
        'endereco',
        'nome_contato',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */

}
