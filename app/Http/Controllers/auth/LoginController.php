<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //

    function login (Request $request) {

        $credentials = $request->validate ([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
       

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return response() -> json([
                "message" => "connexion réusssie",
                "user" => Auth::user(),
                "status" => "success"
            ]);
        }
 
        return response()-> json([
            "status" => "failed",
            "message" => "echec de la connexion",
            'error' => 'The provided credentials do not match our records.'
        ]);
    }
}
