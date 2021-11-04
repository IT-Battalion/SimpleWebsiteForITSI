<?php

use App\Http\Controllers\AuthenticationController;
use Illuminate\Support\Facades\Auth;
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

// All protected routes
Route::middleware(['auth'])->group(function () {
    Route::view('/', 'dashboard', ['user' => Auth::user()]);
});

Route::view('/login', 'auth/login')->name('login');
Route::post('/login', [AuthenticationController::class, 'login']);
Route::view('/register', 'auth/register');
Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/logout', [AuthenticationController::class, 'logout']);