<?php


use App\Http\Controllers\Admin\FlavorController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductTypeController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Shop\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');


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
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/novo', [ProductController::class, 'showNewProductForm'])->name('create');
        Route::post('/novo', [ProductController::class, 'storeNewProduct'])->name('store');
        Route::get('/editar-produto/{product}', [ProductController::class, 'showEditProductForm'])->name('edit');
        Route::post('/editar-produto/{product}', [ProductController::class, 'updateProduct'])->name('update');
        Route::post('/remover-produto/{product}', [ProductController::class, 'destroyProduct'])->name('destroy');
        Route::post('/remover-imagem/{image}', [ProductController::class, 'destroyImage'])->name('destroy.image');
    });

    Route::group([
        'prefix' => 'tipos-produto',
        'as' => 'product.types.'
    ], function () {
        Route::get('/', [ProductTypeController::class, 'index'])->name('index');
        Route::get('/novo', [ProductTypeController::class, 'showNewProductTypeForm'])->name('create');
        Route::post('/novo', [ProductTypeController::class, 'storeProductType'])->name('store');
        Route::get('/editar-tipo-produto/{type}', [ProductTypeController::class, 'showEditProductTypeForm'])->name('edit');
        Route::post('/editar-tipo-produto/{type}', [ProductTypeController::class, 'updateProductType'])->name('update');
        Route::post('/remove-tipo-produto/{type}', [ProductTypeController::class, 'destroyProductType'])->name('destroy');
    });

    Route::group([
        'prefix' => 'categorias',
        'as' => 'categories.'
    ], function () {
        Route::get('/', [ProductCategoryController::class, 'index'])->name('index');
        Route::get('/nova', [ProductCategoryController::class, 'showNewCategoryForm'])->name('create');
        Route::post('/nova', [ProductCategoryController::class, 'storeCategory'])->name('store');
        Route::get('/editar-categoria/{category}', [ProductCategoryController::class, 'showEditCategoryForm'])->name('edit');
        Route::post('/editar-categoria/{category}', [ProductCategoryController::class, 'updateCategory'])->name('update');
        Route::post('/remover-categoria/{category}', [ProductCategoryController::class, 'destroyCategory'])->name('destroy');
    });

    Route::group([
        'prefix' => 'aromas',
        'as' => 'flavors.'
    ], function () {
        Route::get('/', [FlavorController::class, 'index'])->name('index');
        Route::get('/novo', [FlavorController::class, 'showNewFlavorForm'])->name('create');
        Route::get('/editar-aroma/{flavor}', [FlavorController::class, 'showEditFlavorForm'])->name('edit');
        Route::post('/novo', [FlavorController::class, 'storeFlavor'])->name('store');
        Route::post('/editar-aroma/{flavor}', [FlavorController::class, 'updateFlavor'])->name('update');
        Route::post('/remover-aroma/{flavor}', [FlavorController::class, 'destroyFlavor'])->name('destroy');
    });
});


