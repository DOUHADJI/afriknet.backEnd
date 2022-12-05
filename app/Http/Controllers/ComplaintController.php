<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    //

    public function getLastestComplaint () {
        $id = Auth::id();

        $complaint = Complaint::where('user_id', $id) -> orderBy('created_at', 'desc') ->first();

        if($complaint -> statut == 'archived') {
            return response()->json([
                'data' => null,
                'status' => 'success'
            ]);
        }

        return response()->json([
            'data' => $complaint,
            'status' => 'success'
        ]);
    }

    public function store (Request $request) {

        $request -> validate([
            "title" => ["required", 'string', 'max:255'],
            "content" => ["required", 'string', 'max:255'],
        ]);

        $user_request = Complaint::create([ 
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
