<?php

namespace App\Http\Controllers;

use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    //

    public function index () {
        $id = Auth::id();

       $user_requests = ModelsRequest::where('user_id', $id)->get();

       return response()->json([
        "data" => $user_requests,
        "status" => "success"
       ]);

    }

    public function store (Request $request) {

        $request -> validate([
            "title" => ["required", 'string', 'max:255'],
            "content" => ["required", 'string', 'max:255'],
        ]);

        $user_request = ModelsRequest::create([ 
            "motif" => $request -> title,
            'message' => $request -> content,
            'statut' => "received",
            'user_id' => Auth::id()
        ]);

        return response()->json([
            "data" => $user_request,
            "status" => "success"
        ]);
    }
}
