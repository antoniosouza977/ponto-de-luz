<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flavor extends Model
{

    protected $table = 'flavors';
    protected $fillable = [
        'name'
    ];

    public function products(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'flavor_product', 'flavor_id', 'product_id')->withTimestamps();
    }

}
