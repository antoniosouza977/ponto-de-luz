<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductTypeStoreRequest;
use App\Http\Requests\ProductTypeUpdateRequest;
use App\Models\ProductType;
use App\Services\Repository;

class ProductTypeController extends Controller
{

    private Repository $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function index(): \Inertia\Response
    {
        $action = 'Lista de Tipos de Produtos';
        $newBtn = 'Novo Tipo';
        $newRoute = route('product.types.create');
        $types = $this->repository->getAllModelsFrom(new ProductType());

        return inertia()->render('Admin/Types/TypeIndex', compact('action', 'types', 'newBtn', 'newRoute'));
    }

    public function showNewProductTypeForm(): \Inertia\Response
    {
        $action = 'Cadastrar Novo Tipo de Produto';
        $formRoute = route('product.types.store');

        return inertia()->render('Admin/Types/TypeForm', compact('action', 'formRoute'));
    }

    public function storeProductType(ProductTypeStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->repository->updateOrStoreModel($request->all(), new ProductType());

        return redirect()->route('product.types.index');
    }

    public function showEditProductTypeForm(ProductType $type): \Inertia\Response
    {
        $action = 'Editar Tipo de Produto';
        $formRoute = route('product.types.update', $type);

        return inertia()->render('Admin/Types/TypeForm', compact('action', 'formRoute', 'type'));

    }

    public function updateProductType(ProductTypeUpdateRequest $request, ProductType $type): \Illuminate\Http\RedirectResponse
    {
        $this->repository->updateOrStoreModel($request->all(), $type);

        return redirect()->route('product.types.index');
    }

    public function destroyProductType(ProductType $type): \Illuminate\Http\RedirectResponse
    {
        $this->repository->destroyModel($type);

        return redirect()->route('product.types.index');
    }

}
