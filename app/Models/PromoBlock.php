<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/PromoBlock.php
class PromoBlock extends Model
{
    protected $fillable = [
        'slug', 'title', 'subtitle', 'description',
        'button_text', 'button_url', 'image', 'background_color',
        'is_active', 'position'
    ];
}