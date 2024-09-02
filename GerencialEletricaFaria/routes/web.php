<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\ClientesController;

Route::get('/', [HomeController::class, 'index'])->name('home');


// controller produtos
Route::get('/produtos', [ProdutosController::class, 'index'])->name('produto.index');
Route::get('/produtos/create', [ProdutosController::class, 'create'])->name('produto.create');
Route::post('/produtos', [ProdutosController::class, 'store'])->name('produto.store');
Route::get('/produtos/{produto}', [ProdutosController::class, 'show'])->name('produto.show');
Route::get('/produtos/{produto}/edit', [ProdutosController::class, 'edit'])->name('produto.edit');
Route::put('/produtos/{produto}', [ProdutosController::class, 'update'])->name('produto.update');
Route::delete('/produtos/{produto}', [ProdutosController::class, 'destroy'])->name('produto.destroy');


//controller Clientes
Route::get('/clientes', [ClientesController::class, 'index'])->name('clientes.index');
Route::get('/clientes/create', [ClientesController::class, 'create'])->name('clientes.create');
Route::post('/clientes', [ClientesController::class, 'store'])->name('clientes.store');
Route::get('/clientes/{Cliente}', [ClientesController::class, 'show'])->name('clientes.show');
Route::get('/clientes/{Cliente}/edit', [ClientesController::class, 'edit'])->name('clientes.edit');
Route::put('/clientes/{Cliente}', [ClientesController::class, 'update'])->name('clientes.update');
Route::delete('/clientes/{Cliente}', [ClientesController::class, 'destroy'])->name('clientes.destroy');
