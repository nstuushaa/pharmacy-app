<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Models\City;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('home', compact('banners'));
    }
}
