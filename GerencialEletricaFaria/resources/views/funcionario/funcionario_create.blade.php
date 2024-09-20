@extends('layout.index')

@section('conteudo')
    <form action="{{ route('funcionarios.store') }}" method="POST">
        @csrf
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="number" name="cpf" placeholder="cpf" required>
        <input type="text" step="rg" name="rg" placeholder="rg" required>
        <input type="number" step="telefone" name="telefone" placeholder="telefone" required>
        <input type="text" name="email" placeholder="email" required>
        <input type="date" step="data_contratacao" name="data_contratacao" placeholder="data_contratacao" required>
        <input type="text" step="cargo" name="cargo" placeholder="Cargo" required>
        <input type="number" name="0.01" placeholder="salario" required>
        <button type="submite"></button>
    <form action="">Salvar</form>
@endsection

