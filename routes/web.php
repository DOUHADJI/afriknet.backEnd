<?php

use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogOutController;
use App\Http\Controllers\auth\RegisterUserController;
use App\Http\Controllers\auth\UserController;
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
    dd(env('FRONTEND_URL'));
    return view('welcome');
});

Route::post('/register', [RegisterUserController::class, 'store'])->middleware('guest');
    

Route::post('/login', [LoginController::class, "login"])->middleware('guest');

Route::get("/user", [UserController::class, "user"]) -> middleware('auth:sanctum');

Route::post("/update", [UserController::class, "update"]) -> middleware('auth:sanctum');

Route::get("/logout", [LogOutController::class, 'logout']) -> middleware('auth:sanctum'); 
    

