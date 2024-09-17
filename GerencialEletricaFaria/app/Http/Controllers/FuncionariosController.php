<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class FuncionariosController extends Controller
{
    public function index()
    {
        $funcionario = Funcionario::all();
        return view('funcionario.funcionario', ['funcionarios' => $funcionario]);
    }

    public function create()
    {
        return view('funcionario.funcionario_create');
    }

    /**§
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|numeric',
            'rg' => 'required|string|max:20',
            'telefone' => 'required|numeric',
            'email' => 'required|string|email|max:255',
            'data_contratacao' => 'required|date',
            'cargo' => 'required|string|max:100',
            'salario' => 'required|numeric|min:0',
        ]);

        Funcionario::create($validatedData);

        return redirect()->route('funcionarios.index')->with('message', 'Funcionário salvo com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $funcionario = Funcionario::findOrFail($id);
        return view('funcionario.funcionario_show', ['funcionarios' => $funcionario]);
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
    public function destroy(Funcionario $funcionario)
    {
        $funcionario->delete();
        return route('funcionarios.index');
    }
}
