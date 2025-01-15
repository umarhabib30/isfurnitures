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
        'price',
        'delivery_charge',
        'delivery_time',
        'discount_price',
        'discount_time',
        'description',
        'image',
        'color_id',
        'seatnumber_id',
        'stuff_id',
        'size_id',
        'sold_qty'

    ];
    protected $appends = ['average_rating'];

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
        return $this->belongsTo(Color::class, 'color_id');
    }

    public function orderItem()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function seat()
    {
        return $this->belongsTo(Seat::class, 'seatnumber_id');
    }
    public function stuff()
    {
        return $this->belongsTo(Stuff::class, 'stuff_id');
    }
    public function size()
    {
        return $this->belongsTo(Size::class);
    }
    public function rating()
    {
        return $this->hasMany(Review::class);
    }
    public function getAverageRatingAttribute()
    {
        return $this->rating()->avg('rating') ?? 0;
    }
}
