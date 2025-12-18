<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }
}
