<?php


use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return inertia()->render('Home');
})->name('home');


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth', 'superAdmin']
], function () {
    Route::get('/', function () {
        return inertia()->render('Admin/Dashboard');
    })->name('dashboard');

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
        Route::get('/', [ProductCategoryController::class, 'index'])->name('index');
        Route::get('/nova', [ProductCategoryController::class, 'showNewCategoryForm'])->name('create');
        Route::get('/editar-categoria/{category}', [ProductCategoryController::class, 'showEditCategoryForm'])->name('edit');
        Route::post('/editar-categoria/{category}', [ProductCategoryController::class, 'updateCategory'])->name('update');
        Route::post('/nova', [ProductCategoryController::class, 'storeCategory'])->name('store');
        Route::post('/remover-categoria/{category}', [ProductCategoryController::class, 'destroyCategory'])->name('destroy');
    });
});


