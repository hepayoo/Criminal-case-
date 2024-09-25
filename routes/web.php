<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;



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


Route::get('messages', [MessageController::class, 'fetchMessages']);
Route::post('messages', [MessageController::class, 'sendMessage']);

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');

















