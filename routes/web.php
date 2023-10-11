<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return inertia('Home');
})->name('home');

Route::get('/registrar', [RegisterController::class,'showForm'])->name('register.get');
Route::post('/registrar', [RegisterController::class,'registerNewUser'])->name('register.post');

