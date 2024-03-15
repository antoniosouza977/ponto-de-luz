<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCategoryRequest;
use App\Models\ProductCategory;
use App\Services\Repository;
use Illuminate\Http\RedirectResponse;
use Inertia\Response;

class ProductCategoryController extends Controller
{
    private Repository $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function showNewCategoryForm(): Response
    {
        $action = 'Cadastrar Nova Categoria';
        $formRoute = route('categories.store');

        return inertia()->render('Admin/Categories/CategoryForm', compact('action', 'formRoute'));
    }

    public function storeCategory(ProductCategoryRequest $request): RedirectResponse
    {
//        dd($request->all());
        $this->repository->storeModel($request->all(), new ProductCategory());

        return redirect()->back();
    }
}
