<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoticiaController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('noticias', [NoticiaController::class, 'index']); // Rota responsável por listar todos os registros
// Route::get('noticias/create', [NoticiaController::class, 'create']); // Rota responsável pelo formulário de criação
// Route::post('noticias', [NoticiaController::class, 'store']); // Rota responsável por salvar a criação
// Route::get('noticias/edit/{noticia}', [NoticiaController::class, 'edit']); // Rota responsável pelo formulário de edição
// Route::put('noticias/{noticia}', [NoticiaController::class, 'update']); // Rota responsável por salvar a edição
// Route::delete('noticias/{noticia}', [NoticiaController::class, 'delete']); // Rota responsável por excluir um registro
// Route::middleware('auth')->group(function() {
    Route::resource('noticias', NoticiaController::class);
    Route::resource('comentarios', ComentarioController::class);
    Route::get('/home', [HomeController::class, 'index'])->name('home');
// });
