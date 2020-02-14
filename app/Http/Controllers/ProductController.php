<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {

        $assortments = auth()->user()->assortments;
        $assortments_array = [];
        foreach($assortments as $a) {
            array_push($assortments_array, $a->ocascd);
        }

        $products = Product::whereHas('assortments', function($q) use ($assortments_array) {
            $q->whereIn('oiascd', $assortments_array);
            $q->whereIn('type', ['frame', 'bike', 'part']);
        })->get();

        //$products = Product::where('type', 'bike')->orWhere('type', 'frame')->get();
        return view('products.index', [
            'products' => $products
        ]);
    }
}
