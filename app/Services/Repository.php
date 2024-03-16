<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Repository
{
    public function getAllModelsFrom(Model $model): Collection
    {
        return $model::all();
    }

    public function updateOrStoreModel(array $data, Model $model): Model
    {
        $model->fill($data);
        $model->save();

        return $model;
    }

    public function destroyModel(Model $model): void
    {
        $model->delete();
    }

}
