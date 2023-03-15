<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

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

// Handles the fetch made by CreatEvents.js and returns a json containing all existing users.

Route::middleware('auth')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', function () {
    $users = User::all();
    return response()->json($users);
});
