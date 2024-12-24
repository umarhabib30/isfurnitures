<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'subcategory_id',
        'name',
        'original_price',
        'sale_price',
        'delivery_charge',
        'delivery_time',
        'discount_price',
        'discount_time',
        'description',
        'image',
        'color_id'
    ];

    /**
     * category
     *
     * @return void
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Get the subcategory associated with the product.
     */
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcategory_id');
    }

    /**
     * Get the subcategory associated with the product.
     */
    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function color()
    {
        return $this->belongsTo(Color::class,'color_id');
    }
}
