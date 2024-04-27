<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'invocie_id',
        'user_id',
        'sub_total',
        'amount',
        'currency_name',
        'currency_icon',
        'product_qty',
        'payment_method',
        'payment_status',
        'order_address',
        'shpping_method',
        'coupon',
        'order_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }
}
