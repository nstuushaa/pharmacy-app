<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = ['branch_id', 'product_id', 'quantity', 'price', 'discount'];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Цена со скидкой
    public function getDiscountedPriceAttribute()
    {
        return $this->price * (1 - $this->discount / 100);
    }
}
