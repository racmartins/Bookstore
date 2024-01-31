<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

// Rotas Públicas
Route::get('/', function () {
    return view('welcome');
});

// Autenticação
require __DIR__.'/auth.php';

// Rotas Protegidas
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rotas de Perfil
    Route::get('/profile/show', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rotas de Livros
    Route::resource('books', BookController::class);

    // Rotas de Autores
    Route::resource('authors', AuthorController::class);

    // Rotas de Editoras
    Route::resource('publishers', PublisherController::class);
});
