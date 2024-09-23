@extends('layout.index')

@section('conteudo')
    <h1>Ordens de Serviço</h1>
        <a href="{{ route('OrdemServiços.create') }}">Criar Nova Ordem</a>

        <table class="table">
            <thead>
                <tr class="table-header">
                    <th class="table-cell">ID</th>
                    <th class="table-cell">Cliente</th>
                    <th class="table-cell">Nome O.S</th>
                    <th class="table-cell">Status</th>
                    <th class="table-cell">Total</th>
                </tr>
            </thead>
            <tbody id="productList">
                @foreach ($ordens as $linha)
                    <tr class="table-row">
                        <td class="table-cell">{{ $linha->id_ordem_servico}}</td>
                        <td class="table-cell">{{ $linha->id_pessoa}}</td>
                        <td class="table-cell">{{ $linha->nome_ordem }}</td>
                        <td class="table-cell">{{ $linha->id_status }}</td>
                        <td class="table-cell">{{ $linha->total_servico }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
@stop
