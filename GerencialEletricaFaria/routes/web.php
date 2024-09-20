<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\OrdemServiçosController;
use App\Http\Controllers\FuncionariosController;
use App\Http\Controllers\PessoasController;
use App\Http\Controllers\Itens_da_ordemController;

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
Route::get('/OrdemServiços', [OrdemServiçosController::class, 'index'])->name('OrdemServiços.index');
Route::get('/OrdemServiços/create', [OrdemServiçosController::class, 'create'])->name('OrdemServiços.create');
Route::post('/OrdemServiços', [OrdemServiçosController::class, 'store'])->name('OrdemServiços.sstore');
Route::get('/OrdemServiços/{OrdemServiço}', [OrdemServiçosController::class, 'show'])->name('OrdemServiços.show');
Route::get('/OrdemServiços/{OrdemServiço}/edit', [OrdemServiçosController::class, 'edit'])->name('OrdemServiços.edit');
Route::put('/OrdemServiços/{OrdemServiço}', [OrdemServiçosController::class, 'update'])->name('OrdemServiços.update');
Route::delete('/OrdemServiços/{OrdemServiço}', [OrdemServiçosController::class, 'destroy'])->name('OrdemServiços.destroy');

//Controller Clientes
Route::get('/clientes', [PessoasController::class, 'index'])->name('pessoas.index');
Route::get('/clientes/create', [PessoasController::class, 'create'])->name('pessoas.create');
Route::post('/clientes', [PessoasController::class, 'store'])->name('pessoas.store');
Route::get('/clientes/{cliente}', [PessoasController::class, 'show'])->name('pessoas.show');
Route::get('/clientes/{cliente}/edit', [PessoasController::class, 'edit'])->name('pessoas.edit');
Route::put('/clientes/{cliente}', [PessoasController::class, 'update'])->name('pessoas.update');
Route::delete('/clientes/{cliente}', [PessoasController::class, 'destroy'])->name('pessoas.destroy');

//Controller Funcionarios
Route::get('/funcionarios', [FuncionariosController::class, 'index'])->name('funcionarios.index');
Route::get('/funcionarios/funcionario', [FuncionariosController::class, 'create'])->name('funcionarios.create');
Route::post('/funcionarios', [FuncionariosController::class, 'store'])->name('funcionarios.store');
Route::get('/funcionarios/{funcionario}', [FuncionariosController::class, 'show'])->name('funcionarios.show');
Route::get('/funcionarios/{funcionario}/edit', [FuncionariosController::class, 'edit'])->name('funcionarios.edit');
Route::put('/funcionarios/{funcionario}', [FuncionariosController::class, 'update'])->name('funcionarios.update');
Route::delete('/funcionarios/{funcionario}', [FuncionariosController::class, 'destroy'])->name('funcionarios.destroy');

//Controller Intens da Ordem
Route::get('/itens_da_ordem_serviço', [Itens_da_ordemController::class, 'index'])->name('itens_da_ordem_serviço.index');
Route::get('/itens_da_ordem_serviço/itens_da_ordem_serviço', [Itens_da_ordemController::class, 'create'])->name('itens_da_ordem_serviço.create');
Route::post('/itens_da_ordem_serviço', [Itens_da_ordemController::class, 'store'])->name('itens_da_ordem_serviço.store');
Route::get('/itens_da_ordem_serviço/{itens_da_ordem_serviço}', [Itens_da_ordemController::class, 'show'])->name('itens_da_ordem_serviço.show');
Route::get('/itens_da_ordem_serviço/{itens_da_ordem_serviço}/edit', [Itens_da_ordemController::class, 'edit'])->name('itens_da_ordem_serviço.edit');
Route::put('/itens_da_ordem_serviço/{itens_da_ordem_serviço}', [Itens_da_ordemController::class, 'update'])->name('itens_da_ordem_serviço.update');
Route::delete('/itens_da_ordem_serviço/{itens_da_ordem_serviço}', [Itens_da_ordemController::class, 'destroy'])->name('itens_da_ordem_serviço.destroy');


