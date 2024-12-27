<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    protected $fillable = [
        'seat_number',
    ];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
