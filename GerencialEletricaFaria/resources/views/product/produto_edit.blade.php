
@extends('layout.index')
@section('conteudo')

        <form action="">
            <input type="text" name="nome_produto" value="{{$produto->nome_produto }}">
            <input type="text" name="nome_produto" value="{{$produto->descricao }}">
            <input type="text" name="nome_produto" value="{{$produto->preco_custo }}">
            <input type="text" name="nome_produto" value="{{$produto->preco }}">
            <input type="text" name="nome_produto" value="{{$produto->estoque }}">
        </form>
@endsection

