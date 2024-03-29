<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

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
            get: fn($value) => number_format($value, 2, ',', '.'),
            set: fn($value) => currencyToFloat($value)
        );
    }

    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(ProductCategory::class, 'categories_products', 'product_id', 'category_id')
            ->withTimestamps();
    }

    public function images(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id')->orderBy('view_order');
    }

}
