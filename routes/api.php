<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//////////////////////////////////////::Public routes::///////////////////////////////////////

//register route//
Route::post('register', [RegisteredUserController::class, 'store']);

//login route//
Route::post('login', [AuthenticatedSessionController::class, 'store']);

//logout route//
Route::middleware('auth:sanctum')->post('logout', [AuthenticatedSessionController::class, 'destroy']);

//post route//
Route::middleware('auth:sanctum')->post('posts', [PostController::class, 'store']);