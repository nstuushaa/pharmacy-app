<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'code', 'brand_id', 'package_qty'];

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // Рейтинг остаётся
    public function getRatingAttribute()
    {
        return $this->reviews()->avg('rating') ?: 0;
    }
}
