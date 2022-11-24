<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
