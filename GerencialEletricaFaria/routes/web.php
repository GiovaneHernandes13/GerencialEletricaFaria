<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\OrdemServiçosController;
use App\Http\Controllers\FuncionariosController;

Route::get('/', [HomeController::class, 'index'])->name('home');


// Controller Produtos
Route::get('/produtos', [ProdutosController::class, 'index'])->name('produto.index');
Route::get('/produtos/create', [ProdutosController::class, 'create'])->name('produto.create');
Route::post('/produtos', [ProdutosController::class, 'store'])->name('produto.store');
Route::get('/produtos/{produto}', [ProdutosController::class, 'show'])->name('produto.show');
Route::get('/produtos/{produto}/edit', [ProdutosController::class, 'edit'])->name('produtos.edit');
Route::put('/produtos/{produto}', [ProdutosController::class, 'update'])->name('produto.update');
Route::delete('produtos/{produto}', [ProdutosController::class, 'destroy'])->name('produto.destroy');

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

Route::get('/cests', [FuncionariosController::class, 'index'])->name('clientes.index');
Route::get('/cests/cest', [FuncionariosController::class, 'create'])->name('clientes.create');
Route::post('/cests', [FuncionariosController::class, 'store'])->name('clientes.store');
Route::get('/cests/{cest}', [FuncionariosController::class, 'show'])->name('clientes.show');
Route::get('/cests/{cest}/edit', [FuncionariosController::class, 'edit'])->name('clientes.edit');
Route::put('/cests/{cest}', [FuncionariosController::class, 'update'])->name('clientes.update');
Route::delete('/cests/{cest}', [FuncionariosController::class, 'destroy'])->name('clientes.destroy');

