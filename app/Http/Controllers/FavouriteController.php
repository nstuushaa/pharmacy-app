<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    public function index()
    {
        return view('favourite'); // Убедись, что у тебя есть файл favourite.blade.php
    }
}
