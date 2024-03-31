<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCategoryStoreRequest;
use App\Http\Requests\ProductCategoryUpdateRequest;
use App\Models\ProductCategory;
use App\Models\ProductType;
use App\Services\Repository;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Inertia\Response;

class ProductCategoryController extends Controller
{
    private Repository $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function index(): Response
    {
        $action = 'Lista de Categorias';
        $newBtn = 'Nova Categoria';
        $newRoute = route('categories.create');
        $categories = $this->repository->getAllModelsFrom(new ProductCategory());

        return inertia()->render('Admin/Categories/CategoryIndex', compact('action', 'categories', 'newBtn', 'newRoute'));
    }

    public function showNewCategoryForm(): Response
    {
        $action = 'Cadastrar Nova Categoria';
        $formRoute = route('categories.store');
        $types = $this->repository->getAllModelsFrom(new ProductType());

        return inertia()->render('Admin/Categories/CategoryForm', compact('action', 'formRoute', 'types'));
    }

    public function showEditCategoryForm(ProductCategory $category): Response
    {
        $action = 'Editar categoria: ' . $category->name;
        $formRoute = route('categories.update', $category);
        $types = $this->repository->getAllModelsFrom(new ProductType());

        return inertia()->render('Admin/Categories/CategoryForm', compact('category','action', 'formRoute', 'types'));
    }

    public function updateCategory(ProductCategoryUpdateRequest $request, ProductCategory $category): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $this->repository->updateOrStoreModel($request->all(), $category);

        return redirect()->route('categories.index');
    }

    public function storeCategory(ProductCategoryStoreRequest $request): RedirectResponse
    {
        $this->repository->updateOrStoreModel($request->all(), new ProductCategory());

        return redirect()->route('categories.index');
    }

    public function destroyCategory(ProductCategory $category): RedirectResponse
    {
        $this->repository->destroyModel($category);

        return redirect()->route('categories.index');
    }
}
