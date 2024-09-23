<?php

namespace App\Http\Controllers;

use App\Models\OrdemDeServico;
use App\Models\Funcionario; // Adicione esta linha
use App\Models\Status;
use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;


class OrdemDeServicoController extends BaseController
{
    public function index()
    {
        $ordens = OrdemDeServico::all();
        return view('ordem_de_servico.index', compact('ordens'));
    }

    public function create()
    {
        $funcionarios = Funcionario::all(); // Busca todos os funcionários
        $status = Status::all(); // Busca todos os status
        $clientes = Pessoa::all(); // Busca todos os clientes
    
        return view('ordem_de_servico.create', compact('funcionarios', 'status', 'clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_funcionario' => 'required',
            'data_abertura' => 'required|date',
            'data_fechamento' => 'nullable|date', // Opcional
            'descricao_servico' => 'required|string',
            'quantidade_servico' => 'required|integer', // Corrigido para o nome correto
            'preco_unitario_servico' => 'required|numeric', // Corrigido para o nome correto
            'id_status' => 'required',
            'id_pessoa' => 'required',
        ]);
    
        OrdemDeServico::create($request->all());
        return redirect()->route('OrdemServiços.index')->with('success', 'Ordem de Serviço criada com sucesso.');
    }
    

    public function show(OrdemDeServico $ordem)
    {
        return view('ordens.show', compact('ordem'));
    }

    public function edit(OrdemDeServico $ordem)
    {
        return view('ordens.edit', compact('ordem'));
    }

    public function update(Request $request, OrdemDeServico $ordem)
    {
        $request->validate([
            'id_funcionario' => 'required',
            'data_abertura' => 'required|date',
            'descricao_servico' => 'required|string',
            'quantidade' => 'required|integer',
            'preco_unitario' => 'required|numeric',
            'id_status' => 'required',
            'id_pessoa' => 'required',
        ]);

        $ordem->update($request->all());
        return redirect()->route('ordens.index')->with('success', 'Ordem de Serviço atualizada com sucesso.');
    }

    public function destroy(OrdemDeServico $ordem)
    {
        $ordem->delete();
        return redirect()->route('ordens.index')->with('success', 'Ordem de Serviço excluída com sucesso.');
    }
}

