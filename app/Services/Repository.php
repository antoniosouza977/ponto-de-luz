<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

class Repository
{
    public function storeModel(array $data, Model $model): Model
    {
        $model->fill($data);
        $model->save();

        return $model;
    }

}
