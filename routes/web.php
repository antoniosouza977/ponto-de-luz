<?php


use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return inertia()->render('Home');
});

Route::get('/admin', function () {
    return inertia()->render('Admin/Dashboard');
});

Route::group([
    'prefix' => 'produtos',
    'as' => 'products.'
], function () {
    Route::get('/novo', [ProductController::class, 'showNewProductForm'])->name('new');
});

Route::group([
    'prefix' => 'categorias',
    'as' => 'categories.'
], function () {
    Route::get('/nova', [ProductCategoryController::class, 'showNewCategoryForm'])->name('create');
    Route::post('/nova', [ProductCategoryController::class, 'storeCategory'])->name('store');
});
