<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $table = 'produtos';

    protected $primaryKey = 'id_produto'; // Especifica a chave primária

    public $incrementing = true; // Se for auto-incrementável
    protected $keyType = 'int';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_produto',
        'nome_produto',
        'descricao',
        'preco',
        'estoque',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'preco' => 'decimal:2',
        ];
    }
}
