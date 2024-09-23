@extends('layout.index')

@section('conteudo')
    <h2>CREATE O.S.</h2>

    <form action="{{ route('OrdemServiços.store') }}" method="POST">
        @csrf
        <div class="container_os">
            <div class="grupo">
                <label for="id_pessoa">Cliente:</label>
                <select name="id_pessoa" id="id_pessoa" class="form-control" required>
                    <option value="">Selecione um cliente</option>
                    @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="grupo">
                <label for="id_funcionario">Funcionário:</label>
                <select name="id_funcionario" id="id_funcionario" class="form-control" required>
                    <option value="">Selecione um funcionário</option>
                    @foreach ($funcionarios as $funcionario)
                        <option value="{{ $funcionario->id_funcionario }}">{{ $funcionario->nome }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="data_abertura">Data de Abertura:</label>
            <input type="date" name="data_abertura" id="data_abertura" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="descricao_servico">Descrição do Serviço:</label>
            <textarea name="descricao_servico" id="descricao_servico" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="quantidade_servico">Quantidade de Serviço:</label>
            <input type="number" name="quantidade_servico" id="quantidade_servico" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="preco_unitario_servico">Preço Unitário:</label>
            <input type="number" name="preco_unitario_servico" id="preco_unitario_servico" class="form-control" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="id_status">Status:</label>
            <select name="id_status" id="id_status" class="form-control" required>
                <option value="">Selecione um status</option>
                @foreach ($status as $st)
                    <option value="{{ $st->id_status }}">{{ $st->descricao_status }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="data_fechamento">Data de Fechamento:</label>
            <input type="date" name="data_fechamento" id="data_fechamento" class="form-control">
        </div>



        <button type="submit" class="btn btn-primary">Criar O.S.</button>
    </form>
@endsection
