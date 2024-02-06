<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

}

{{-- resources/views/books/index.blade.php --}}

@extends('layouts.app')

@section('content')
    <style>
        /* Os seus estilos personalizados */
    </style>

    <h1 class="mb-4">Livros</h1>
    <a href="{{ route('books.create') }}" class="btn btn-primary mb-4">Adicionar Novo Livro</a>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($books as $book)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <!-- Substitua por uma imagem de placeholder ou remova se não houver imagens -->
                        <img src="{{ $book->cover_image ?? 'path/to/your/placeholder/image.png' }}" class="card-img-top" alt="Capa do livro">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <p class="card-text">{{ Str::limit($book->description, 100) }}</p>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-end">
                                <!-- Botões e ações -->
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-4">
            {{ $books->links() }}
        </div>
    </div>
@endsection
