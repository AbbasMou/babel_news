<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//public routes
//register route
Route::post('register', [\App\Http\Controllers\AuthController::class, 'register']);
//login route
Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);


// routes needs authentication 
Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [\App\Http\Controllers\AuthController::class, 'user']);
    // logout route
    Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout']);

});
