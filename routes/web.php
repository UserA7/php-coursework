<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\UserAuthController;

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


Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {return view('home');})->name('home');
    //Games Page Route
    Route::resource('games', GameController::class);
});

//Auth Routes
Route::get('/register', [UserAuthController::class, 'register'])->name('register');
Route::post('/register', [UserAuthController::class, 'registerPost'])->name('register.post');

Route::get('/login', [UserAuthController::class, 'login'])->name('login');
Route::post('/login', [UserAuthController::class, 'loginPost'])->name('login.post');

Route::get('/logout', [UserAuthController::class, 'logout'])->name('logout');

