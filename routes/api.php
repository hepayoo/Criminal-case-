<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CrimeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\DashboardCrimeController;
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

//crimes-post route for family//
Route::middleware('auth:sanctum')->post('posts', [PostController::class, 'store']);
Route::get('home-posts', [HouseController::class, 'index']);
Route::get('posts/{post:slug}', [PostController::class, 'show']);







//post route for admin//
Route::middleware('auth:sanctum')->post('crimes', [CrimeController::class, 'store']);
Route::middleware('auth:sanctum')->put('crimes/{crime:slug}', [CrimeController::class, 'update']);
Route::delete('crimes/{crime:slug}', [CrimeController::class, 'destroy']);

Route::get('home-crimes', [HomeController::class, 'index']);

Route::get('crimes/{crime:slug}', [CrimeController::class, 'show']);

Route::get('dashboard-crimes', [DashboardCrimeController::class, 'index']);
Route::get('crimes', [CrimeController::class, 'index']);

//admin//
Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index']);
});