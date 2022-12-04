<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    //

    public function current_subscription () {
        $user_id = Auth::id();
        $current_subscription = Subscription::where('user_id', $user_id) -> where('expiration_date', '>', date('Y-m-d')) -> orderBy('created_at', "desc") -> first();
     
           
        

        if($current_subscription ===null) {

            $data = (object) [
                "subscription" => $current_subscription,
                'offer' => null
            ];
            
            return response()->json([
                'data' => $data,
                'message' => "Vous n'avez aucun  abonnement en cours",
                'status' => 'success'
            ]);
        }

        $offer = Offer::whereId($current_subscription->offer_id) -> first();
        
        $data = (object) [
            "subscription" => $current_subscription,
            'offer' => $offer
        ];



        return response()->json([
            'data' => $data,
            'status' => 'success'
        ]);

    }

    public function store (Request $request) {
        $request -> validate([
            "id" =>['required']
        ]);

        $user_id = Auth::id();
        $offer_id = $request -> id;
        $expiration_date = date('Y-m-d', strtotime("+30 days"));

        $current_subscription = Subscription::where('user_id', $user_id) -> where('expiration_date', '>', date('Y-m-d')) -> orderBy('created_at', "desc") -> first();

        if($current_subscription !==null) {
            
            return response()->json([
                'data' => null,
                'message' => 'Vous avez déjà un abonnement en cours',
                'status' => 'success'
            ]);
        }

        
        $subscription = Subscription::create([
            'start_date' => date('Y-m-d'),
            'expiration_date' => $expiration_date,
            'offer_id' => $offer_id,
            'user_id' => $user_id
        ]);

        return response()->json([
            'data' => $subscription,
            'status' => 'success'
        ]);
    }

    public function subscriptions_history () {

        $user_id = Auth::id();
        $subscriptions = Subscription::where('user_id', $user_id)->orderBy('created_at', "desc")->get();

        return response()->json([
            'data' => $subscriptions,
            'status' => "success"
        ]);
    }
}

