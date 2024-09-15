<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionariosController extends Controller
{
    public function index()
    {
        $funcionario = Funcionario::all();
        return view('funcionario.funcionario', ['funcionarios' => $funcionario]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**§
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
    public function edit(Funcionario $funcionario)
    {
        return view('funcionario.funcionario_edit', ['funcionario' => $funcionario]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Funcionario $funcionario)
    {
        // Valida os dados recebidos da requisição
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'required|string',
            'email' => 'required|string',
            'cargo' => 'required|string',
            'salario' => 'required|numeric',
        ]);
        
        // Atualiza o produto com os dados validados
        $updated = $funcionario->update($validatedData);
    
        if ($updated) {
            return redirect()->route('funcionarios.index')->with('message', 'Produto atualizado com sucesso!');
        }
    
        return redirect()->back()->with('message', 'Erro ao atualizar o produto');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
