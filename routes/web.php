<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function () {
    Route::get('/logout', [\App\Http\Controllers\IndexController::class, 'logout'])->name('logout');
    Route::resource('users', \App\Http\Controllers\UserController::class);
});

    Route::get('/login', [\App\Http\Controllers\IndexController::class, 'login'])->name('login');
    Route::post('/auth', [\App\Http\Controllers\IndexController::class, 'loginAuth'])->name('auth');


Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('home');


