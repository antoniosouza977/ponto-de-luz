<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock_quantity',
        'status',
        'category_id'
    ];

    protected function price(): Attribute
    {
        return Attribute::make(
            set: fn($value) => currencyToFloat($value)
        );
    }

    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(ProductCategory::class, 'category_product', 'product_id', 'category_id')
            ->withTimestamps();
    }

    public function flavors(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Flavor::class, 'flavor_product', 'product_id', 'flavor_id')
            ->orderBy('name')
            ->withTimestamps();
    }

    public function images(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id')->orderBy('view_order');
    }

}
