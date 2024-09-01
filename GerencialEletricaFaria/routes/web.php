<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutosController;

Route::get('/', [HomeController::class, 'index'])->name('home');


//contro produtos - CRUD
Route::get('/Produtos', [ProdutosController::class, 'index'])->name('produtos.index');
Route::get('/Produtos/create', [ProdutosController::class, 'create'])->name('produtos.create');
Route::post('/Produtos', [ProdutosController::class, 'store'])->name('produtos.store');
Route::get('/Produtos/{produto}', [ProdutosController::class, 'show'])->name('produtos.show');
Route::get('/Produtos/{produto}/edit', [ProdutosController::class, 'edit'])->name('produtos.edit');
Route::put('/Produtos/{produto}', [ProdutosController::class, 'update'])->name('produtos.update');
Route::delete('/Produtos/{produto}', [ProdutosController::class, 'destroy'])->name('produtos.destroy');