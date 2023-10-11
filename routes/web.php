<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return inertia('Home');
})->name('home');

Route::get('/registrar', [RegisterController::class,'showForm'])->name('register.get');
Route::post('/registrar', [RegisterController::class,'registerNewUser'])->name('register.post');

Route::get('/login',[LoginController::class,'showForm'])->name('login.get');
Route::post('/login',[LoginController::class,'doLogin'])->name('login.post');

Route::middleware(['auth'])->group(function () {
    Route::get('admin',[AdminDashboardController::class,'index'])->name('admin');
});

