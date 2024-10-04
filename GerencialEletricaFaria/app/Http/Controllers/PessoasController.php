<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;

class PessoasController extends Controller
{
    /**
     * Exibir lista de pessoas.
     */
    public function index()
    {
        $pessoas = Pessoa::all();
        return view('clients.index', ['pessoas' => $pessoas]); // Mantenha 'pessoas' em minúsculas
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        // Validação baseada no tipo de pessoa
        if ($request->input('tipo') == 1) {
            // Validação para Pessoa Física
            $validatedData = $request->validate([
                'tipo' => 'required|integer|in:1,2',
                'cpf' => 'required|string|max:11|unique:pessoas,cpf',
                'rg' => 'required|string|max:20',
                'nome' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:pessoas,email',
                'telefone' => 'required|string|max:15',
                'data_nascimento' => 'required|date',
                'apelido' => 'nullable|string|max:255',
            ]);
        } elseif ($request->input('tipo') == 2) {
            // Validação para Pessoa Jurídica
            $validatedData = $request->validate([
                'tipo' => 'required|integer|in:1,2',
                'cnpj' => 'required|string|max:14|unique:pessoas,cnpj',
                'inscricao_estadual' => 'required|string|max:20',
                'razao_social' => 'required|string|max:255',
                'fantasia' => 'nullable|string|max:255',
                'email' => 'required|string|email|max:255|unique:pessoas,email',
                'telefone' => 'required|string|max:15',
                'data_fundacao' => 'required|date',
            ]);
    
            // Preenchendo o campo 'nome' com 'razao_social' para Pessoa Jurídica
            $validatedData['nome'] = $validatedData['razao_social'];
        } else {
            return back()->withErrors(['tipo' => 'Tipo invalido']);
        }
    
        \App\Models\Pessoa::create($validatedData);
    
        return redirect()->route('pessoas.index')->with('success', 'Pessoa cadastrada com sucesso!');
    }
    
    
    
    public function show($id)
    {
        $pessoas = Pessoa::findOrFail($id);
        return view('clients.show', compact('pessoas'));
    }

    public function edit($id)
    {
        $pessoa = Pessoa::findOrFail($id);
        return view('clients.edit', compact('pessoa'));
    }

    public function update(Request $request, $id)
    {
        // Validação baseada no tipo de pessoa
        if ($request->input('tipo') == 1) {
            // Validação para Pessoa Física
            $validatedData = $request->validate([
                'tipo' => 'required|integer|in:1,2',
                'cpf' => 'required|string|max:11|unique:pessoas,cpf,' . $id,
                'rg' => 'required|string|max:20',
                'nome' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:pessoas,email,' . $id,
                'telefone' => 'required|string|max:15',
                'data_nascimento' => 'required|date',
                'id_endereco' => 'required|integer|exists:enderecos,id_endereco',
                'apelido' => 'nullable|string|max:255',
            ]);
        } elseif ($request->input('tipo') == 2) {
            // Validação para Pessoa Jurídica
            $validatedData = $request->validate([
                'tipo' => 'required|integer|in:1,2',
                'cnpj' => 'required|string|max:14|unique:pessoas,cnpj,' . $id,
                'inscricao_estadual' => 'required|string|max:20',
                'razao_social' => 'required|string|max:255',
                'fantasia' => 'nullable|string|max:255',
                'email' => 'required|string|email|max:255|unique:pessoas,email,' . $id,
                'telefone' => 'required|string|max:15',
                'data_fundacao' => 'required|date',
                'id_endereco' => 'required|integer|exists:enderecos,id_endereco',
            ]);
        } else {
            return back()->withErrors(['tipo' => 'Tipo inválido']);
        }
    
        // Encontra a pessoa no banco de dados
        $pessoa = Pessoa::findOrFail($id);
    
        // Atualiza os dados no banco de acordo com o tipo
        $pessoa->update($validatedData);
    
        // Redireciona com sucesso
        return redirect()->route('pessoas.index')->with('success', 'Pessoa atualizada com sucesso!');
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
