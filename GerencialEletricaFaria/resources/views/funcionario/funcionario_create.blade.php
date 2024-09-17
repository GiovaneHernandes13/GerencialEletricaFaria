@extends('layout.index')

@section('conteudo')
    <form action="{{ route('funcionarios.store') }}" method="POST">
        @csrf
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="number" name="cpf" placeholder="000.000.000-00" required>
        <input type="text" name="rg" placeholder="RG" required>
        <input type="number" name="telefone" placeholder="Telefone" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="date" name="data_contratacao" placeholder="Data de Contratação" required>
        <input type="text" name="cargo" placeholder="Cargo" required>
        <input type="number" step="0.01" name="salario" placeholder="Salário" required>
        <button type="submit">Salvar</button>
    </form>
@endsection


