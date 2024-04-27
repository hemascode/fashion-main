<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = []; // Allow mass assignment for all attributes

    // Define relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Static method to add a new item to the cart
    public static function add($data)
    {
        return self::create($data);
    }
}
