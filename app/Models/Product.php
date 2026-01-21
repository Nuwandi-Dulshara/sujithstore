<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'sku',
        'price',
        'discount_price',
        'quantity',
        'description',
        'status',
        'featured',
    ];

    // Product belongs to category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Product has many images (LATEST FIRST ✅ FIX)
    public function images()
    {
        return $this->hasMany(ProductImage::class)->latest();
    }
}
