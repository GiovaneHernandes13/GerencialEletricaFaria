@extends('layout.index')

@section('conteudo')

    <h1>Lista de Funcionários</h1>
    <a class="btn_add" href="{{ route('funcionarios.create') }}">ADD Funcionario</a>
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
                <form action="{{ route('funcionarios.destroy', $funcionario) }}" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir este Funcionario?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit">
                        <img class="icons" src="{{ asset('img/excluir.png') }}" alt="Excluir">
                    </button>
                </form>
            </li>
        @endforeach
    </ul>

@endsection


