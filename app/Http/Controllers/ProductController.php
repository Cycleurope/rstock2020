<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {

        $role = auth()->user()->role;

        if($role == 'dealer') {

            $assortments = auth()->user()->assortments;
            $assortments_array = [];
            foreach($assortments as $a) {
                array_push($assortments_array, $a->ocascd);
            }

            $products = Product::whereHas('assortments', function($q) use ($assortments_array) {
                $q->whereIn('oiascd', $assortments_array);
                $q->whereIn('type', ['frame', 'bike']);
            })->where(function($q) {
                $q->where('mbstat', 20);
                $q->orWhere('mbstat', 50);
            })->whereRaw('LENGTH(mmitno) > 6')
            ->get();

            return view('products.index', [
                'products' => $products
            ]);

        } else {

            $products = Product::whereIn('type', ['bike', 'frame'])->get();

            return view('products.index-admin', [
                'products' => $products
            ]);

        }

    }
}
