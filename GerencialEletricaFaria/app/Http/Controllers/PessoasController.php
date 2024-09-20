<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Pessoa;

class PessoasController extends Controller
{
    /**
     * Exibir lista de pessoas.
     */
    public function index()
    {
        $pessoas = Pessoa::all();
        return view('clients.index', ['Pessoas' => $pessoas]);
    }


    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {
        $pessoa = Pessoa::findOrFail($id);
        return view('pessoa.show', compact('pessoa'));
    }

    public function edit($id)
    {
        $pessoa = Pessoa::findOrFail($id);
        return view('pessoa.edit', compact('pessoa'));
    }

    /**
     * Atualizar uma pessoa específica.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tipo' => 'required|in:1,2',
            'nome_razao_social' => 'nullable|required_if:tipo,1|string|max:255',
            'razao_social' => 'nullable|required_if:tipo,2|string|max:255',
            'fantasia_apelido' => 'nullable|required_if:tipo,1|string|max:255',
            'fantasia' => 'nullable|required_if:tipo,2|string|max:255',
            'cpf' => 'nullable|required_if:tipo,1|cpf|unique:pessoas,cpf,' . $id,  // Validação de CPF
            'cnpj' => 'nullable|required_if:tipo,2|cnpj|unique:pessoas,cnpj,' . $id,  // Validação de CNPJ
            'rg' => 'nullable|required_if:tipo,1|string|max:20',
            'inscricao_estadual' => 'nullable|required_if:tipo,2|string|max:20',
            'email' => 'required|email|max:255',
            'telefone' => 'required|string|max:20',
        ]);

        $pessoa = Pessoa::findOrFail($id);
        $pessoa->update([
            'tipo' => $request->tipo,
            'nome' => $request->input('tipo') == 1 ? $request->nome_razao_social : null,
            'razao_social' => $request->input('tipo') == 2 ? $request->razao_social : null,
            'fantasia' => $request->input('tipo') == 2 ? $request->fantasia : null,
            'apelido' => $request->input('tipo') == 1 ? $request->fantasia_apelido : null,
            'cpf' => $request->input('tipo') == 1 ? $request->cpf : null,
            'cnpj' => $request->input('tipo') == 2 ? $request->cnpj : null,
            'rg' => $request->input('tipo') == 1 ? $request->rg : null,
            'inscricao_estadual' => $request->input('tipo') == 2 ? $request->inscricao_estadual : null,
            'email' => $request->email,
            'telefone' => $request->telefone,
        ]);

        return redirect()->route('pessoas.index')->with('success', 'Cliente atualizado com sucesso!');
    }

    /**
     * Remover uma pessoa específica.
     */
    public function destroy($id)
    {
        Pessoa::destroy($id);
        return redirect()->route('pessoas.index')->with('success', 'Cliente removido com sucesso!');
    }
}
