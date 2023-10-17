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


//register route
Route::post('register', [\App\Http\Controllers\AuthController::class, 'register']);
//login route
Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [\App\Http\Controllers\AuthController::class, 'user']);
   
    // logout route
    Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout']);
});

// update count route 
Route::patch('clicks/{category}', [\App\Http\Controllers\ClicksController::class, 'updateCount']);
// store click route 
Route::post('clicks', [\App\Http\Controllers\ClicksController::class, 'storeClick']);
