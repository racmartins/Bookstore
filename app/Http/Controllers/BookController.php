<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    private $booksFile;

    public function __construct()
    {
        $this->booksFile = storage_path('app/books.json');
    }

    private function getBooks()
    {
        return json_decode(file_get_contents($this->booksFile), true);
    }

    private function saveBooks($books)
    {
        file_put_contents($this->booksFile, json_encode($books, JSON_PRETTY_PRINT));
    }

    public function index()
    {
        $books = $this->getBooks();
        return view('books.index', ['books' => $books]);
    }

    public function show($id)
    {
        $books = $this->getBooks();
        $book = $books[$id] ?? null;
        return view('books.show', ['book' => $book]);
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $books = $this->getBooks();
        $newId = count($books) > 0 ? max(array_keys($books)) + 1 : 1;
        $books[$newId] = $request->all();
        $this->saveBooks($books);

        return redirect('/books');
    }
    public function edit($id)
    {
        $books = $this->getBooks();
        $book = $books[$id] ?? null;
        return view('books.edit', ['book' => $book, 'id' => $id]);
    }

    public function update(Request $request, $id)
    {
        $books = $this->getBooks();
        $books[$id] = $request->all();
        $this->saveBooks($books);

        return redirect('/books');
    }

    public function destroy($id)
    {
        $books = $this->getBooks();
        unset($books[$id]);
        $this->saveBooks($books);

        return redirect('/books');
    }
}
