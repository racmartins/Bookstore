<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index()
    {
        //$publishers = Publisher::all();
        $publishers = Publisher::paginate(15);
        return view('publishers.index', compact('publishers'));
    }

    public function create()
    {
        return view('publishers.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            // Adicione outras validações necessárias para o modelo Publisher
        ]);

        Publisher::create($validatedData);
        return redirect('/publishers')->with('success', 'Editora adicionada com sucesso.');
    }

    public function show($id)
    {
        $publisher = Publisher::findOrFail($id);
        return view('publishers.show', compact('publisher'));
    }

    public function edit($id)
    {
        $publisher = Publisher::findOrFail($id);
        return view('publishers.edit', compact('publisher'));
    }

    public function update(Request $request, $id)
    {
    $validatedData = $request->validate([
        'title' => [
            'required',
            'max:255',
            Rule::unique('books')->ignore($id)->where(function ($query) use ($request) {
                return $query->where('author_id', $request->author_id);
            }),
        ],
        'author_id' => 'required|exists:authors,id',
        // Adicione outras validações necessárias para o modelo Book
    ]);

    $book = Book::findOrFail($id);
    $book->update($validatedData);

    return redirect('/books')->with('success', 'Livro atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $publisher = Publisher::findOrFail($id);
        $publisher->delete();
        return redirect('/publishers')->with('success', 'Editora removida com sucesso.');
    }
}
