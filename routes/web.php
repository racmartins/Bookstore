<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ManageUsersController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FeaturedBooksController;

use Illuminate\Support\Facades\Route;

// Rotas Públicas
Route::get('/', function () {
    return view('welcome');
});
Route::get('/sobre', function () {
    return view('sobre');
})->name('sobre');

Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/featured-books', [FeaturedBooksController::class,'featuredBooks'])->name('books.featured');


// Autenticação
require __DIR__.'/auth.php';

// Rotas Protegidas
Route::group(['middleware' => ['auth', 'admin']], function () {
    // Rotas acessíveis apenas pelo admin
    Route::resource('manage-users', ManageUsersController::class);
    Route::resource('contacts', ContactController::class);

    Route::patch('/books/{book}/mark-featured', [BookController::class, 'markAsFeatured'])
        ->name('books.mark-featured');
        Route::patch('/books/{book}/remove-featured', [BookController::class, 'removeFeatured'])
        ->name('books.remove-featured');
    

    // Usando a sintaxe de array para definir a rota updateStatus com middleware admin
    Route::patch('/contacts/{id}/status', [ContactController::class, 'updateStatus'])
         ->name('contacts.updateStatus');
    
});

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
