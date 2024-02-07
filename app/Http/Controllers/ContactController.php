<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; // Importar o Auth facade
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        // Pagina os contactos em vez de buscar todos de uma vez
        $contacts = Contact::paginate(15); // Aqui, 15 é o número de itens por página
        return view('contacts.index', compact('contacts'));

    }
    public function create(Request $request)
    {
        $mensagemPredefinida = '';
        if ($request->query('preencher') == 'mensagem') {
            $mensagemPredefinida = 'Pretendo fazer parte desta livraria pelo que solicito a criação de conta.';
        }
        return view('contacts.create', compact('mensagemPredefinida'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Contact::create($validatedData);

        return redirect()->back()->with('success', 'Mensagem enviada com sucesso.');
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.show', compact('contact'));
    }

    public function updateStatus(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->status = $request->status; // 'respondido' ou 'pendente'
        $contact->save();

        return back()->with('success', 'Status do contato atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Contato removido com sucesso!');
    }

}
