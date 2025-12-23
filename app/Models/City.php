<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name', 'slug'];
    
    public function branches()
    {
        return $this->hasMany(Branch::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}