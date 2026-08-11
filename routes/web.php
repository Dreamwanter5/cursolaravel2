<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

Route::get('/', [IndexController::class, 'index']);
use App\Http\Controllers\LivroController;

Route::get('/livros', [LivroController::class, 'index']);
Route::get('/livros/create', [LivroController::class, 'create']);
Route::post('/livros', [LivroController::class, 'store']);
Route::get('/livros/{livro}', [LivroController::class, 'show']);
Route::get('/livros/{livro}/edit', [LivroController::class, 'edit']);
Route::patch('/livros/{livro}', [LivroController::class, 'update']);
Route::delete('/livros/{livro}', [LivroController::class, 'destroy']);
Route::get('/livros/imagem/{livro}', [LivroController::class,'imagem']);
Route::delete('/livros/imagem/{livro}', [LivroController::class,'destroy_imagem']);
Route::get('/livros/excel', [LivroController::class,'excel']);
Route::get('/livros/pdf', [LivroController::class,'pdf']);
