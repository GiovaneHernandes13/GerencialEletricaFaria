@extends('layout.index')
@section('conteudo')
    <ul>
        <li>{{ $produto->id_produto }}</li>
        <li>{{ $produto->nome_produto }}</li>
        <li>{{ $produto->descricao }}</li>
        <li>{{ $produto->preco }}</li>
    </ul>
    
@endsection
