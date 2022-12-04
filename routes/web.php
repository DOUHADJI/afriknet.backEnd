<?php

use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogOutController;
use App\Http\Controllers\auth\RegisterUserController;
use App\Http\Controllers\auth\UserController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/offers', [OfferController::class, 'index']);

Route::post('/register', [RegisterUserController::class, 'store'])->middleware('guest');
    
Route::post('/login', [LoginController::class, "login"])->middleware('guest');

Route::get("/user", [UserController::class, "user"]) -> middleware('auth:sanctum');

Route::post("/update", [UserController::class, "update"]) -> middleware('auth:sanctum');

Route::get("/logout", [LogOutController::class, 'logout']) -> middleware('auth:sanctum'); 

Route::post("/send_request", [RequestController::class, 'store']) -> middleware('auth:sanctum'); 

Route::get("/get_lastest_complaint", [ComplaintController::class, 'getLastestComplaint']) -> middleware('auth:sanctum'); 

Route::post("/send_complaint", [ComplaintController::class, 'store']) -> middleware('auth:sanctum'); 

Route::get("/current_subscription", [SubscriptionController::class, 'current_subscription']) -> middleware('auth:sanctum'); 

Route::get("/subscriptions_history", [SubscriptionController::class, 'subscriptions_history']) -> middleware('auth:sanctum'); 

Route::post("/subscribe_offer", [SubscriptionController::class, 'store']) -> middleware('auth:sanctum'); 





    

