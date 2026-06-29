<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

Route::get('/', fn() => redirect('/login'));

Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    if (!session()->has('user_id')){
        return redirect('/login')->with('error', 'Please login first.');
    }
    return view('dashboard');
})->name('dashboard');
=======

Route::get('/', function () {
    return view('welcome');
});
>>>>>>> b2903720525738ccb61c7575855ac0ff28b34811
