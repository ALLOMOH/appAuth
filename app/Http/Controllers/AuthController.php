<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function login(){

        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function logout(LoginRequest $reuqest){
        //
    }
}


