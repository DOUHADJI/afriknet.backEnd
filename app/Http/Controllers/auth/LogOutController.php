<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogOutController extends Controller
{
    //

    public function logout(Request $request)
{
    Auth::guard('web')->logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return response() -> json([
        "status" => "success",
        "message" => "user session invalidate"
    ]);
}

}
