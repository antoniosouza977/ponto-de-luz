<?php


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return inertia()->render('Home');
});

Route::get('/admin', function () {
    return inertia()->render('Admin/Dashboard');
});
