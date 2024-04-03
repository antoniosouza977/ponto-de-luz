<?php

namespace App\Http\Controllers\Api;

use App\Models\Flavor;
use App\Models\ProductCategory;
use App\Services\Repository;

class FilterOptionsController
{
    private Repository $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function getProductFilters(): \Illuminate\Http\JsonResponse
    {
        $categories = $this->repository->getAllModelsFrom(new ProductCategory, ['id', 'name']);
        $flavors = $this->repository->getAllModelsFrom(new Flavor, ['id', 'name']);

        return response()->json([
            'categories' => $categories,
            'flavors' => $flavors
        ]);
    }

}
