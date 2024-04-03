<?php

namespace App\Services\Eloquent\Filters;

use Illuminate\Database\Eloquent\Builder;

interface Filter
{
    public function applyFilter(Builder $query, $value): Builder;
}


