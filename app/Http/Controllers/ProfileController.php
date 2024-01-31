<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile view.
     */
    public function show()
    {
        $user = Auth::user(); // Obter o utilizador autenticado
        return view('profile.show', compact('user'));
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            // Adicione validações para outros campos se necessário
        ]);

        $user = $request->user();

        // Processar e guardar da foto do perfil
        if ($request->hasFile('profile_photo')) {
            $imageName = time() . '.' . $request->profile_photo->extension();
            $request->profile_photo->move(public_path('images'), $imageName);

            // Guardar o caminho da imagem na base de dados ou armazenamento
            $user->profile_photo = 'images/' . $imageName;
        }

        // Atualizar outros campos do perfil
        $user->fill($validatedData);

        // Verificar se o e-mail foi alterado e redefinir 'email_verified_at'
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
