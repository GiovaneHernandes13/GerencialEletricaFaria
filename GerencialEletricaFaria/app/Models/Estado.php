<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'ESTADO';

    protected $fillable = [
        'nome_estado',
        'uf_estado',
        'codigo_estado',
    ];
}
