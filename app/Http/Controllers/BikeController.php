<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bike;

class BikeController extends Controller
{
    public function index()
    {
        $products = Bike::all();
        return view('products.index', [
            'products' => $products
        ]);
    }
}
