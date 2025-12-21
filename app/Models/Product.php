<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'code', 'brand_id', 'package_qty', 'category_id', 'is_hit', 'is_deal_of_day'];

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
    public function primaryImage()
    {
        return $this->hasOne(ProductImage::class)->where('is_primary', true);
    }
}
