<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;

class DeliveryPageController extends Controller
{
     public function index()
{
    $cities = City::all();
    return view('delivery-info', compact('cities'));
}
}
