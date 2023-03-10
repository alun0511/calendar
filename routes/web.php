<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::view('/', 'index')->name('login');

Route::post('login', LoginController::class);

Route::get('logout', LogoutController::class);

Route::view('/register', 'register');

Route::post('/register/attempt', RegisterController::class);

Route::view('/welcome', 'welcome');