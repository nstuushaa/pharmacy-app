<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Catalog;
use Illuminate\Http\Request;
use App\Models\City;

class HeaderController extends Controller
{
    public function index(){
        $cities = City::all();
        $catalogs = Catalog::all();
        return view('partials.header', compact('cities, catalogs'));
    }
}
