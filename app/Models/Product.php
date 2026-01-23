<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'name',
        'sku',
        'price',
        'discount_percentage',
        'quantity',
        'description',
        'status',
        'featured',
    ];

    protected $casts = [
        'price' => 'float',
        'discount_percentage' => 'integer',
        'quantity' => 'integer',
        'featured' => 'boolean',
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

    /**
     * Final calculated price after applying discount_percentage.
     */
    public function getFinalPriceAttribute()
    {
        $dp = $this->discount_percentage;
        if (! $dp || $dp <= 0) {
            return (float) $this->price;
        }

        $final = $this->price - ($this->price * ($dp / 100));
        return round((float) $final, 2);
    }

    /**
     * Return true if product has a valid discount percentage.
     */
    public function isDiscounted()
    {
        return (int) ($this->discount_percentage ?? 0) > 0;
    }
}
