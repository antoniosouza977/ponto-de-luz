<?php

namespace App\Services\Eloquent\Filters\Product;

use App\Services\Eloquent\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class ProductCategoryFilter implements Filter
{

    public function applyFilter(Builder $query, $value): Builder
    {
        return $query->whereHas('categories', function ($category) use ($value) {
            $category->where('category_id', $value);
        });
    }
}
