<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name'
    ];
    public function subcategories()
    {
        return $this->hasMany(SubCategory::class);
    }
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
