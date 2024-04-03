<?php

namespace App\Services\Eloquent\Builders;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class QueryBuilderAbstract
{
    public function build(Model $model, array $relations, array $filters, bool $paginate = true, int $per_page = 10): Collection|LengthAwarePaginator|array
    {
        $query = $model->newQuery()->with($relations);

        foreach ($filters as $filter_key => $filter_value) {
            if (array_key_exists($filter_key, $this->filters())) {
                $filter_class_instance = app($this->filters()[$filter_key]);
                $query = $filter_class_instance->applyFilter($query, $filter_value);
            }
        }

        if ($paginate) return $query->paginate($per_page);

        return $query->get();
    }

    public function filters(): array
    {
        return [];
    }
}
