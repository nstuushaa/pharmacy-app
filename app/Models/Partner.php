<?php

// app/Models/Partner.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = ['name', 'logo', 'url', 'position', 'is_active'];

    // Сортировка по умолчанию: активные + по position
    protected static function booted()
    {
        static::addGlobalScope('active', function ($query) {
            $query->where('is_active', true);
        });
        static::addGlobalScope('ordered', function ($query) {
            $query->orderBy('position');
        });
    }
}