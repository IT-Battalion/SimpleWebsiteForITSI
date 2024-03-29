<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ColorController;
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
    Route::view('/', 'dashboard', ['user' => Auth::user()])->name('dashboard');
    Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');
    Route::view('/admin', 'admin')->name('admin');
    Route::view('/color', 'color');
    Route::post('/color', [ColorController::class, 'setColor']);
});

Route::view('/login', 'auth/login')->name('login');
Route::post('/login', [AuthenticationController::class, 'login']);
Route::view('/register', 'auth/register')->name('register');
Route::post('/register', [AuthenticationController::class, 'register']);
