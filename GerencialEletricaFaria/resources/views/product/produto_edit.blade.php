@extends('layout.index')
@section('conteudo')

    @if (session()->has('message'))
        {{ session()->get('message')}}
    @endif
    <form action="{{ route('produtos.update', ['produto' => $produto->id_produto]) }}" method="POST">
        @csrf
        @method('PUT') <!-- Outra forma de usar o método PUT -->
        <input type="text" name="nome_produto" value="{{ $produto->nome_produto }}">
        <input type="text" name="descricao" value="{{ $produto->descricao }}">
        <input type="text" name="preco_custo" value="{{ $produto->preco_custo }}">
        <input type="text" name="preco" value="{{ $produto->preco }}">
        <input type="text" name="estoque" value="{{ $produto->estoque }}">
        <button type="submit">Salvar</button>
    </form>
@endsection
