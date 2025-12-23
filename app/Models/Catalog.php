<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    protected $fillable = ['name', 'slug', 'icon'];

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}