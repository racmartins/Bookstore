<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ManageUsersController extends Controller
{
    /**
     * Mostra a lista de utilizadores.
     */
    public function index()
    {
        $users = User::all();
        return view('manage-users.index', compact('users'));
    }

    /**
     * Mostra um form para criar novo utilizador.
     */
    public function create()
    {
        return view('manage-users.create');
    }

    /**
     * Armazena um utilizador recem criado na Base de Dados.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required',
        ]);

        // Criptografar a senha antes de guardar
        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return redirect()->route('manage-users.index');
    }

    /**
     * Mostra um utilizador específico.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('manage-users.show', compact('user'));

    }

    /**
     * Mostra o form para editar um utilizador existente.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('manage-users.edit', compact('user'));
    }

    /**
     * Atualiza um utilizador na Base de Dados.
     */
    public function update(Request $request, $id)
    {
        // Buscar o utilizador
        $user = User::findOrFail($id);

        // Validação dos dados
        $validatedData = $request->validate([
         'name' => 'required|max:255',
         'email' => 'required|email|max:255|unique:users,email,' . $user->id,
         'password' => 'nullable|min:6',
         // Inclua outras validações conforme necessário
        ]);

        // Verifica se a senha foi fornecida e criptografa
        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($request->password);
        } else {
            // Remove a senha dos dados validados para não tentar atualizar com valor nulo
            unset($validatedData['password']);
        }

        // Atualização do utilizador
        $user->update($validatedData);

        return redirect()->route('manage-users.index')->with('success', 'Utilizador atualizado com sucesso!');
    }

    /**
     * Remove um utilizador da Base de Dados.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('manage-users.index');
    }
}
