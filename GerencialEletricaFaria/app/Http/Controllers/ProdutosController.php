<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\User;

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
        
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        return view('product.produto_edit', ['produto' => $produto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updated = $this->produto->where('id_produto', $id)->update($request->except(['_token','_method']));
        if($updated){
            return redirect()->back()->with('message', 'Atualização feita com Sucesso');
        }
     
        return redirect()->back()->with('message', 'Error updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
