<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Cest;
use App\Models\Ncm;

class ProdutosController extends Controller
{
    public readonly Produto $produto;

    public function __construct()
    {
        $this->produto = new Produto();
    }
    
    public function index()
    {
        $produtos = $this->produto->all();
        return view('product.produtos', ['produtos' => $produtos]);
            
    }

    public function create()
    {
        $cests = Cest::all(); // Busca todos os CESTs
        $ncms = Ncm::all();   // Busca todos os NCMs
        
        // Retorna a view com as variáveis compactadas para uso na view
        return view('product.produto_create', compact('cests', 'ncms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome_produto' => 'required|string|max:255',
            'descricao' => 'required|string',
            'preco_custo' => 'required|numeric',
            'preco' => 'required|numeric',
            'estoque' => 'required|integer',
            'id_cest' => 'nullable|exists:cests,id_cest', 
            'id_ncm' => 'nullable|exists:NCM,id_ncm', 
        ]);

        Produto::create($validatedData);

        return redirect()->route('produto.index')->with('message', 'Produto salvo com sucesso!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        return view('product.produto_show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        $cests = Cest::all();
        $ncms = Ncm::all();

        return view('product.produto_edit', ['produto' => $produto], compact('cests', 'ncms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        // Valida os dados recebidos da requisição
        $validatedData = $request->validate([
            'nome_produto' => 'required|string|max:255',
            'descricao' => 'required|string',
            'preco_custo' => 'required|numeric',
            'preco' => 'required|numeric',
            'estoque' => 'required|integer',
            'id_cest' => 'nullable|exists:cest,id_cest',
            'id_ncm' => 'nullable|exists:NCM,id_ncm',
        ]);
        
        // Atualiza o produto com os dados validados
        $updated = $produto->update($validatedData);
    
        if ($updated) {
            return redirect()->route('produto.index')->with('message', 'Produto atualizado com sucesso!');
        }
    
        return redirect()->back()->with('message', 'Erro ao atualizar o produto');
    }
    
    
    public function destroy(string $id)
    {
        $this->produto->where('id_produto', $id)->delete();
        return redirect()->route('produtos.index'); // Corrigido o nome da rota
    }
    
}