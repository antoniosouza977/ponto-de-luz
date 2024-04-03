<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Repository
{
    public function getAllModelsFrom(Model $model, array $columns = null): Collection
    {
        if ($columns) {
            return $model->newQuery()->select($columns)->get();
        }
        return $model::all();
    }

    public function updateOrStoreModel(array $data, Model $model): Model
    {
        $model->fill($data);
        $model->save();

        return $model;
    }

    public function modelWithRelations(Model $model, array $relations): Model
    {
        return $model->load($relations);
    }

    public function destroyModel(Model $model): void
    {
        $model->delete();
    }

    public function syncManyToManyRelations($relation, array $ids): void
    {
        $relation->sync($ids);
    }

}
