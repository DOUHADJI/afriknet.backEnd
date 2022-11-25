<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    //

    function user( Request $request) {
        
        $user = Auth::user();

        return response() -> json([
            "user" => $user,
            "message" => "the user is authentified",
            "status" => "success"
        ]);
    }


    function update( Request $request) {
        
        $request -> validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'contact' => ['required', 'string', 'max:25',]
        ]);

        if (Auth::check()) {
            // The user is logged in...
            $user = User::findOrFail( Auth::id());

            $user -> update([
                'name' => $request -> name,
                'email' => $request -> email,
                'city' => $request -> city,
                'country' =>$request -> country,
                'address' => $request -> address,
                'contact' => $request -> contact,
            ]);

        }

        return response() -> json([
            "user" => $user,
            "message" => "the user's informations updated",
            "status" => "success"
        ],200);
    }
}
