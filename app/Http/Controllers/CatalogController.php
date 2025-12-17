<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catalog;

class CatalogController extends Controller
{
    public function show(string $slug)
    {
        $catalog = Catalog::where('slug', $slug)->firstOrFail();
        return view('show', compact('catalog'));
    }
}
