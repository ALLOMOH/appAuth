<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class AuthController extends Controller
{

    public function index(){
        return view('dashboard', ['user' => Auth::user()]);
    }

    public function showLogin(){
        return view('auth.login');
    }

    public function doLogin(LoginRequest $request){
        $credentials = $request->all();

        if(Auth::attempt($credentials)){
            

            return redirect()->intended('dashboard')->with('success', 'Connexion effectuée avec succès !');
        }

        return back()->withErrors([
            'email' => 'Email ou mot de passe incorrect'
        ])->onlyInput('email');

    }


    public function showRegister(){
        return view('auth.register');
    }


    public function doRegister(RegisterRequest $request){
        $data = $request->all();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        Auth::login($user);
        return redirect()->route('dashboard')->with('success', 'Inscription effectuée avec succès !');
    }

    public function logout(){
        Auth::logout();
        return to_route('auth.login');
    }
}


