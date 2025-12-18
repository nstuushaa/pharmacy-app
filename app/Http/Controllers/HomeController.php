<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\PromoBlock;

class HomeController extends Controller
{
    public function index()
    {
        $leftBanner = PromoBlock::where('slug', 'main_left')->first();
        $rightBanner = PromoBlock::where('slug', 'main_right')->first();

    // Если нужно — загрузите мини-товары (см. ниже)
    //$miniProducts = Product::whereIn('id', [1, 2])->get(); // или по тегу "promo"

        return view('home', compact('leftBanner', 'rightBanner'));
    }
}
