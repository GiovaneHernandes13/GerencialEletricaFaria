<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\ClientesPFController;
use App\Http\Controllers\ClientesPJController;
use App\Http\Controllers\OrdemServiçosController;
use App\Http\Controllers\FuncionariosController;

Route::get('/', [HomeController::class, 'index'])->name('home');


// Controller Produtos
Route::get('/produtos', [ProdutosController::class, 'index'])->name('produto.index');
Route::get('/produtos/create', [ProdutosController::class, 'create'])->name('produto.create');
Route::post('/produtos', [ProdutosController::class, 'store'])->name('produto.store');
Route::get('/produtos/{produto}', [ProdutosController::class, 'show'])->name('produto.show');
Route::get('/produtos/{produto}/edit', [ProdutosController::class, 'edit'])->name('produto.edit');
Route::put('/produtos/{produto}', [ProdutosController::class, 'update'])->name('produto.update');
Route::delete('/produtos/{produto}', [ProdutosController::class, 'destroy'])->name('produto.destroy');


//Controller Clientes_PF
Route::get('/clientesPF', [ClientesPFController::class, 'index'])->name('clientesPF.index');
Route::get('/clientesPF/create', [ClientesPFController::class, 'create'])->name('clientesPF.create');
Route::post('/clientesPF', [ClientesPFController::class, 'store'])->name('clientesPF.store');
Route::get('/clientesPF/{ClientePF}', [ClientesPFController::class, 'show'])->name('clientesPF.show');
Route::get('/clientesPF/{ClientePF}/edit', [ClientesPFController::class, 'edit'])->name('clientesPF.edit');
Route::put('/clientesPF/{ClientePF}', [ClientesPFController::class, 'update'])->name('clientesPF.update');
Route::delete('/clientesPF/{ClientePF}', [ClientesPFController::class, 'destroy'])->name('clientesPF.destroy');


//Controller Clientes_PJ
Route::get('/clientesPF', [ClientesPJController::class, 'index'])->name('clientesPJ.index');
Route::get('/clientesPF/create', [ClientesPJController::class, 'create'])->name('clientesPJ.create');
Route::post('/clientesPF', [ClientesPJController::class, 'store'])->name('clientesPJ.store');
Route::get('/clientesPF/{ClientePJ}', [ClientesPJController::class, 'show'])->name('clientesPJ.show');
Route::get('/clientesPF/{ClientePJ}/edit', [ClientesPJController::class, 'edit'])->name('clientesPJ.edit');
Route::put('/clientesPF/{ClientePJ}', [ClientesPJController::class, 'update'])->name('clientesPJ.update');
Route::delete('/clientesPF/{ClientePJ}', [ClientesPJController::class, 'destroy'])->name('clientesPJ.destroy');


//Controller OrdemServiço
Route::get('/OrdemServiços', [OrdemServiçosController::class, 'index'])->name('OrdemServiços.index');
Route::get('/OrdemServiços/create', [OrdemServiçosController::class, 'create'])->name('OrdemServiços.create');
Route::post('/OrdemServiços', [OrdemServiçosController::class, 'store'])->name('OrdemServiços.store');
Route::get('/OrdemServiços/{OrdemServiço}', [OrdemServiçosController::class, 'show'])->name('OrdemServiços.show');
Route::get('/OrdemServiços/{OrdemServiço}/edit', [OrdemServiçosController::class, 'edit'])->name('OrdemServiços.edit');
Route::put('/OrdemServiços/{OrdemServiço}', [OrdemServiçosController::class, 'update'])->name('OrdemServiços.update');
Route::delete('/OrdemServiços/{OrdemServiço}', [OrdemServiçosController::class, 'destroy'])->name('OrdemServiços.destroy');


//Controller Funcionarios
Route::get('/clientes', [FuncionariosController::class, 'index'])->name('clientes.index');
Route::get('/clientes/create', [FuncionariosController::class, 'create'])->name('clientes.create');
Route::post('/clientes', [FuncionariosController::class, 'store'])->name('clientes.store');
Route::get('/clientes/{Cliente}', [FuncionariosController::class, 'show'])->name('clientes.show');
Route::get('/clientes/{Cliente}/edit', [FuncionariosController::class, 'edit'])->name('clientes.edit');
Route::put('/clientes/{Cliente}', [FuncionariosController::class, 'update'])->name('clientes.update');
Route::delete('/clientes/{Cliente}', [FuncionariosController::class, 'destroy'])->name('clientes.destroy');
