<?php

namespace App\Http\Controllers\Shop;

use App\Models\Product;
use App\Models\ProductType;
use App\Services\Repository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController
{
    private Repository $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request): \Inertia\Response
    {
        $product_types = $this->repository->getModelsWithRelations(new ProductType(), ['categories']);

        // TODO: buscar topsellers
        $products = $this->repository->getModelsWithRelations(new Product(), ['categories', 'images']);

        return Inertia::render('Shop/Home', compact('product_types', 'products'));

    }
}
