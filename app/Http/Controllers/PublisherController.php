<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
            'name' => 'required|max:255',
            'foundation_year' => 'nullable|numeric',
        ]);

        $publisher = Publisher::findOrFail($id);
        $publisher->update($validatedData);

        // Redireciona para a rota index com uma mensagem de sucesso
        return redirect()->route('publishers.index')->with('success', 'Editora atualizada com sucesso.');
    }

    public function destroy($id)
    {
        $publisher = Publisher::findOrFail($id);
        $publisher->delete(); // Isto agora é um Soft Delete
        return redirect('/publishers')->with('success', 'Editora removida com sucesso.');
    }
}

