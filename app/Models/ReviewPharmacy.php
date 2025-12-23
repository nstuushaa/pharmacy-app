<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewPharmacy extends Model
{
    protected $table = 'reviews_pharmacy'; 

    protected $fillable = [
        'name', 'email', 'rating', 'comment', 'is_approved'
    ];

    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }
}
