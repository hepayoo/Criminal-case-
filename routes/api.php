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


//admin//
// Admin routes with 'auth:sanctum' and 'admin' middlewares
Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    // Admin dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'index']);
    
    // Crimes routes for admin (post and update)
    Route::post('crimes', [CrimeController::class, 'store']);
    Route::put('crimes/{crime:slug}', [CrimeController::class, 'update']);
    Route::delete('crimes/{crime:slug}', [CrimeController::class, 'destroy']);
    // Dashboard crimes
    Route::get('dashboard-crimes', [DashboardCrimeController::class, 'index']);
    
    // Home crimes (admin)
    Route::get('home-crimes', [HomeController::class, 'index']);
    
    // Show crime (admin)
    Route::get('crimes/{crime:slug}', [CrimeController::class, 'show']);
});
