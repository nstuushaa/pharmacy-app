<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function setCity(City $city)
    {
        session(['city_id' => $city->id]);

        return redirect('/' . $city->slug);
    }
}
