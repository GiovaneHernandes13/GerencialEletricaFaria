<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\OrdemDeServicoController;
use App\Http\Controllers\FuncionariosController;
use App\Http\Controllers\PessoasController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;

Route::middleware('auth')->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Controller Produtos
    Route::get('/produtos', [ProdutosController::class, 'index'])->name('produto.index');
    Route::get('/produtos/create', [ProdutosController::class, 'create'])->name('produto.create');
    Route::post('/produtos', [ProdutosController::class, 'store'])->name('produto.store');
    Route::get('/produtos/{produto}', [ProdutosController::class, 'show'])->name('produto.show');
    Route::get('/produtos/{produto}/edit', [ProdutosController::class, 'edit'])->name('produto.edit');
    Route::put('/produtos/{produto}', [ProdutosController::class, 'update'])->name('produto.update');
    Route::delete('/produtos/{produto}', [ProdutosController::class, 'destroy'])->name('produto.destroy');

    //Controller OrdemServiço
    Route::get('/OrdemServiços', [OrdemDeServicoController::class, 'listar'])->name('OrdemServicos.listar');
    Route::get('/OrdemServiços/create', [OrdemDeServicoController::class, 'create'])->name('OrdemServicos.create');
    Route::post('/OrdemServiços', [OrdemDeServicoController::class, 'SalvarOrdem'])->name('OrdemServicos.SalvarOrdem');
    Route::get('/OrdemServiços/{OrdemServiço}', [OrdemDeServicoController::class, 'show'])->name('OrdemServicos.show');
    Route::get('/OrdemServiços/{OrdemServiço}/edit', [OrdemDeServicoController::class, 'edit'])->name('OrdemServicos.edit');
    Route::put('/OrdemServiços/{OrdemServiço}', [OrdemDeServicoController::class, 'update'])->name('OrdemServicos.update');
    Route::delete('/OrdemServicos/{id}', [OrdemDeServicoController::class, 'destroy'])->name('OrdemServicos.destroy');

    //Controller Clientes
    Route::get('/clientes', [PessoasController::class, 'index'])->name('pessoas.index');
    Route::get('/clientes/create', [PessoasController::class, 'create'])->name('pessoas.create');
    Route::post('/clientes', [PessoasController::class, 'store'])->name('pessoas.store');
    Route::get('/clientes/{cliente}', [PessoasController::class, 'show'])->name('pessoas.show');
    Route::get('/clientes/{id}/edit', [PessoasController::class, 'edit'])->name('pessoas.edit');
    Route::put('/clientes/{id}', [PessoasController::class, 'update'])->name('pessoas.update');
    Route::delete('/clientes/{cliente}', [PessoasController::class, 'destroy'])->name('pessoas.destroy');

    //Controller Funcionarios
    Route::get('/funcionarios', [FuncionariosController::class, 'index'])->name('funcionarios.index');
    Route::get('/funcionarios/funcionario', [FuncionariosController::class, 'create'])->name('funcionarios.create');
    Route::post('/funcionarios', [FuncionariosController::class, 'store'])->name('funcionarios.store');
    Route::get('/funcionarios/{funcionario}', [FuncionariosController::class, 'show'])->name('funcionarios.show');
    Route::get('/funcionarios/{funcionario}/edit', [FuncionariosController::class, 'edit'])->name('funcionarios.edit');
    Route::put('/funcionarios/{funcionario}', [FuncionariosController::class, 'update'])->name('funcionarios.update');
    Route::delete('/funcionarios/{funcionario}', [FuncionariosController::class, 'destroy'])->name('funcionarios.destroy');


    Route::get('/cidades/{id_estado}', [PessoasController::class, 'getCidades']);

    Route::get('/ordem-servico/{id}/pdf', [OrdemDeServicoController::class, 'gerarPdf'])->name('ordem-servico.pdf');

    Route::get('/login/google', [GoogleController::class, 'login']);
    Route::get('/callback', [GoogleController::class, 'callback']);
    Route::post('/agenda/adicionar', [GoogleController::class, 'addAgenda']);
    Route::delete('/agenda/remover/{google_id}', [GoogleController::class, 'removerAgenda']);

    Route::get('users', [HomeController::class, 'index'])->name('user.index');

    Route::resource('events', EventController::class);
});
Route::get('/login', function(){
    return view('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
