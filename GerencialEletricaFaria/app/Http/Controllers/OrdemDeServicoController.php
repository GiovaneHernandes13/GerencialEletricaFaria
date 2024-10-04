<?php

namespace App\Http\Controllers;

use App\Models\OrdemDeServico;
use App\Models\Funcionario;
use App\Models\Status;
use App\Models\Pessoa;
use App\Models\Produto;
use App\Models\ItensOrdem;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;


class OrdemDeServicoController extends BaseController
{
    public function index()
    {
        $ordens = OrdemDeServico::all();
        
        // Passando os dados corretamente para a view
        return view('ordem_de_servico.index', ['ordens' => $ordens]);
    }

    public function create()
    {
        $funcionarios = Funcionario::all();
        $status = Status::all();
        $clientes = Pessoa::all();
        $produtos = Produto::all(); // Carregar todos os produtos para a seleção nos itens da ordem
    
        return view('ordem_de_servico.create', compact('funcionarios', 'status', 'clientes', 'produtos'));
    }

    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            // Validações da Ordem de Serviço
            'id_funcionario' => 'required',
            'data_abertura' => 'required|date',
            'descricao_servico' => 'required|string',
            'quantidade_servico' => 'required|integer',
            'preco_unitario_servico' => 'required|numeric',
            'id_status' => 'required',
            'id_pessoa' => 'required',
            'nome_ordem' => 'required|string',
            
            // Validações dos Itens
            'id_produto.*' => 'required|exists:produtos,id_produto',
            'quantidade.*' => 'required|integer|min:1',
            'preco_unitario.*' => 'required|numeric|min:0',
        ]);
 
        $total_servico = $request->quantidade_servico * $request->preco_unitario_servico;

        $ordemDeServico = OrdemDeServico::create([
            'id_funcionario' => $request->id_funcionario,
            'data_abertura' => $request->data_abertura,
            'descricao_servico' => $request->descricao_servico,
            'quantidade_servico' => $request->quantidade_servico,
            'preco_unitario_servico' => $request->preco_unitario_servico,
            'total_servico' => 0, // Inicializa com 0, será atualizado depois
            'id_status' => $request->id_status,
            'id_pessoa' => $request->id_pessoa,
            'nome_ordem' => $request->nome_ordem,
        ]);
        

        $total_servico = 0;

        $produtos = $request->input('id_produto');
        $quantidades = $request->input('quantidade'); 
        $precosUnitarios = $request->input('preco_unitario');
        
        foreach ($produtos as $index => $produtoId) {
            $quantidade = $quantidades[$index];
            $precoUnitario = $precosUnitarios[$index];
        
            $totalProduto = $quantidade * $precoUnitario;
            $total_servico += $totalProduto;
        
            ItensOrdem::create([
                'id_ordem_servico' => $ordemDeServico->id_ordem_servico,
                'id_produto' => $produtoId,
                'quantidade' => $quantidade,
                'preco_unitario' => $precoUnitario,
                'total_produto' => $totalProduto,
            ]);
        }
        
        // Atualiza o total da ordem de serviço com o total calculado
        $ordemDeServico->update(['total_servico' => $total_servico]);
        
        return redirect()->route('OrdemServicos.index')->with('success', 'Ordem de Serviço criada com sucesso!');
    
    }
    

    

    public function show(int $id)
    {
        $ordem = OrdemDeServico::with('status', 'Pessoa', 'funcionario')->findOrFail($id);
        return view('ordem_de_servico.show', compact('ordem'));
    }   
    

    public function edit(OrdemDeServico $ordem)
    {
        return view('ordem_de_servico.edit', compact('ordem'));
    }

    public function update(Request $request, OrdemDeServico $ordem)
    {
        $request->validate([
            'id_funcionario' => 'required',
            'data_abertura' => 'required|date',
            'descricao_servico' => 'required|string',
            'quantidade_servico' => 'required|integer',
            'preco_unitario_servico' => 'required|numeric',
            'id_status' => 'required',
            'id_pessoa' => 'required',
        ]);
    
        // Calcular o total_servico
        $total_servico = $request->quantidade_servico * $request->preco_unitario_servico;
    
        // Atualizar a ordem de serviço com o total recalculado
        $ordem->update(array_merge($request->all(), ['total_servico' => $total_servico]));
    
        return redirect()->route('OrdemServico.index')->with('success', 'Ordem de Serviço atualizada com sucesso.');
    }
    

public function destroy(int $id)
{
    $ordem = OrdemDeServico::findOrFail($id);
    $ordem->delete();
    return redirect()->route('OrdemServicos.index')->with('success', 'Ordem de Serviço excluída com sucesso.');
}

}

