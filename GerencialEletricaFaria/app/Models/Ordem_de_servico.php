<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrdemDeServico extends Model
{
    protected $table = 'ORDEM_DE_SERVICOS';
    protected $primaryKey = 'id_ordem_servico';

    protected $fillable = [
        'id_funcionario',
        'data_abertura',
        'data_fechamento',
        'descricao_servico',
        'quantidade',
        'preco_unitario',
        'id_status',
        'id_pessoa',
    ];

    // Relacionamento com Pessoa
    public function pessoa(): BelongsTo
    {
        return $this->belongsTo(Pessoa::class, 'id_pessoa', 'id');
    }

    // Relacionamento com Status
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class, 'id_status', 'id_status');
    }

    // Relacionamento com Funcionario
    public function funcionario(): BelongsTo
    {
        return $this->belongsTo(Funcionario::class, 'id_funcionario', 'id_funcionario');
    }

    // Relacionamento com Itens da Ordem de Serviço
    public function itens(): HasMany
    {
        return $this->hasMany(ItensOrdem::class, 'id_ordem_servico', 'id_ordem_servico');
    }
}
