<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'order_number',
        'item_name',
        'customer_name',
        'quantity',
        'status'
    ];

    protected static function booted()
    {
        static::creating(function ($order) {
            $order->order_number = 'ORD' . rand(1000, 9999);
            $order->status = 'Pending';
        });
    }
}
