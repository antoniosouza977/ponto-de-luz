<?php

namespace App\Services\Eloquent\Filters\Product;

use App\Services\Eloquent\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class ProductFlavorFilter implements Filter
{

    public function applyFilter(Builder $query, $value): Builder
    {
        return $query->whereHas('flavors', function ($category) use ($value) {
            $category->where('flavor_id', $value);
        });
    }
}
