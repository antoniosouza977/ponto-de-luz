<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCategoryRequest;
use App\Models\ProductCategory;
use App\Services\Repository;
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

        return inertia()->render('Admin/Categories/CategoryForm', compact('action'));
    }

    public function storeCategory(ProductCategoryRequest $request)
    {
//        $this->repository->storeModel($request->all(), new ProductCategory());



        return redirect()->back()->with('message', 'Categoria salva com sucesso!');
    }
}
