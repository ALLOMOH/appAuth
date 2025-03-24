<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    // Afficher la page du dashboard
    public function index()
    {
        return view('dashboard', ['user' => Auth::user()]);
    }

    // Mettre à jour les informations de l'utilisateur
    public function update(Request $request)
    {
        $user = User::find(Auth::id());


        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save($user);

        return redirect()->route('dashboard')->with('success', 'Profil mis à jour avec succès !');
    }
}
