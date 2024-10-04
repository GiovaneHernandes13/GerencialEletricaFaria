@extends('layout.index')

@section('conteudo')

<ul>
    <li>
        <strong>ID:</strong> {{ $ordem->id_ordem_servico }}
    </li>
    <li>
        <strong>Cliente:</strong> {{ $ordem->pessoa->nome ?? 'N/A' }}
    </li>
    <li>
        <strong>Nome:</strong> {{ $ordem->nome_ordem }}
    </li>
    <li>
        <strong>Status:</strong> {{ $ordem->status->descricao_status ?? 'N/A' }}
    </li>
    <li>
        <strong>Total:</strong> {{ $ordem->total_servico }}
    </li>
</ul>

@endsection