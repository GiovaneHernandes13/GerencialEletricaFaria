<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produtos';
    protected $primaryKey = 'id_produto';
    protected $keyType = 'int';

    protected $fillable = [
        'nome_produto',
        'descricao',
        'preco',
        'estoque',
        'preco_custo',
        'id_ncm',
        'id_cest',
    ];

    public function cest() 
    {
        return $this->belongsTo(Cest::class, 'id_cest');
    }

    public function ncm() 
    {
        return $this->belongsTo(Ncm::class, 'id_ncm');
    }

    protected $casts = [
        'preco' => 'decimal:2',
        'preco_custo' => 'decimal:2',
        'estoque' => 'integer',
    ];
}
