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
            <div class="form-group">
                <label for="data_abertura">Data de Abertura:</label>
                <input type="date" name="data_abertura" id="data_abertura" class="form-control" required>
            </div>
        </div>

        <div class="grupo">
            <label for="descricao_servico">Descrição do Serviço:</label>
            <textarea color="white" name="descricao_servico" id="descricao_servico" class="form-control" required></textarea>
        </div>
        <div class="precos">
            <div class="form-group">
                <label for="quantidade_servico">Quantidade:</label>
                <input type="number" name="quantidade_servico" id="quantidade_servico" class="input_qtd" required>
            </div>
        
            <div class="form-group">
                <label for="preco_unitario_servico">Preço Unitário:</label>
                <input type="number" name="preco_unitario_servico" id="preco_unitario_servico" class="input_uni" step="0.01" required>
            </div>
            
            <div class="form-group">
                <label for="total_servico">Total:</label>
                <input type="number" name="total_servico" id="total_servico" class="input_total" step="0.01" required readonly>
            </div>
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
    <script>
        const quantidadeInput = document.getElementById('quantidade_servico');
        const precoInput = document.getElementById('preco_unitario_servico');
        const totalInput = document.getElementById('total_servico');
    
        function calcularTotal() {
            const quantidade = parseFloat(quantidadeInput.value) || 0;
            const precoUnitario = parseFloat(precoInput.value) || 0;
            const total = quantidade * precoUnitario;
            totalInput.value = total.toFixed(2); // Formata o total para duas casas decimais
        }
    
        quantidadeInput.addEventListener('input', calcularTotal);
        precoInput.addEventListener('input', calcularTotal);
    </script>
@endsection
