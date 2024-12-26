<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone_no',
        'zip_code',
        'city',
        'address',
        'order_note',
        'grand_total',
        'qty',
    ];

    public function OrderItem()
    {
        return $this->hasMany(OrderItem::class);
    }
}
