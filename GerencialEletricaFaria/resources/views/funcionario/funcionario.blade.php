@extends('layout.index')

@section('conteudo')

    <h1>Lista de Funcionários</h1>
    <ul>
        @foreach ($funcionarios as $funcionario)
            <li>
                {{ $funcionario->nome }} - {{ $funcionario->cargo }}
                <a href="{{ route('funcionarios.edit', ['funcionario' => $funcionario->id_funcionario]) }}">
                    <img class="icons" src="img/edit.png" alt="Editar">
                </a>                            
                <a href="{{ route('funcionarios.show', ['funcionario' => $funcionario->id_funcionario]) }}">
                    <img class="icons" src="./img/documento.png" alt="Ver detalhes">
                </a>
            </li>
        @endforeach
    </ul>

@endsection


