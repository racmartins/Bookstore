<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    private $books;

    public function __construct()
    {
        // Inicializa os dados de exemplo
        $this->books = [
            1 => ['title' => 'Livro 1', 'author' => 'Autor 1', 'price' => 19.99],
            2 => ['title' => 'Livro 2', 'author' => 'Autor 2', 'price' => 29.99],
            3 => ['title' => 'Livro 3', 'author' => 'Autor 3', 'price' => 24.99],
            4 => ['title' => 'Livro 4', 'author' => 'Autor 4', 'price' => 34.99],
            5 => ['title' => 'Livro 5', 'author' => 'Autor 5', 'price' => 14.99],
            // Adicione mais livros conforme necessário
        ];
    }

    public function index()
    {
        return view('books.index', ['books' => $this->books]);
    }

    public function show($id)
    {
        $book = $this->books[$id] ?? null;
        return view('books.show', ['book' => $book]);
    }
}