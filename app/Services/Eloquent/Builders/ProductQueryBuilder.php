<?php

namespace App\Services\Eloquent\Builders;

use App\Services\Eloquent\Filters\Product\ProductCategoryFilter;
use App\Services\Eloquent\Filters\Product\ProductFlavorFilter;

class ProductQueryBuilder extends QueryBuilderAbstract
{
    public function filters(): array
    {
        return [
            'category_id' => ProductCategoryFilter::class,
            'flavor_id' => ProductFlavorFilter::class
        ];
    }
}
