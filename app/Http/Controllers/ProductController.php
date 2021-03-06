<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Auth;

class ProductController extends Controller
{
    public function index()
    {
        app('debugbar')->disable();
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
                $q->where('mbaval', '>', 0);
            })->where(function($q) {
                $q->where('mbstat', 20);
                $q->orWhere('mbstat', 50);
            })->whereRaw('LENGTH(mmitno) > 6')
            ->get();

            return view('products.index', ['products' => $products]);

        } elseif($role == "sales") {

            $products = Product::whereIn('type', ['bike', 'frame'])->where('mbaval', '>', 0)->get();

            return view('products.index-sales', ['products' => $products]);

        } else {

            $products = Product::whereIn('type', ['bike', 'frame'])->get();

            return view('products.index-admin', ['products' => $products]);
            
        }

    }

    public function indexReact()
    {

        return view('products.index-react');

    }

    public function findByTerm($term)
    {

        if(Auth::user()->role === 'admin'):

            $products = Product::where(function($q) use ($term) {
                $q->where('mmitno', 'like', '%'.$term.'%');
                $q->orWhere('mmitds', 'like', '%'.$term.'%');
                $q->orWhere('mmitcl', 'like', '%'.$term.'%')->get();
            })->where(function($q) {
                $q->whereIn('type', ['bike', 'frame']);
            })->get();

        elseif(Auth::user()->role === 'sales'):

            $products = Product::where(function($q) use ($term) {
                $q->where('mmitno', 'like', '%'.$term.'%');
                $q->orWhere('mmitds', 'like', '%'.$term.'%');
                $q->orWhere('mmitcl', 'like', '%'.$term.'%')->get();
            })->where(function($q) {
                $q->whereIn('type', ['bike', 'frame']);
            })->get();

        else:

            $assortments = Auth::user()->assortments;
            $assortments_array = [];
            foreach($assortments as $a) {
                array_push($assortments_array, $a->ocascd);
            }

            $products = Product::where(function($q) use ($term) {
                $q->where('mmitno', 'like', '%'.$term.'%');
                $q->orWhere('mmitds', 'like', '%'.$term.'%');
                $q->orWhere('mmitcl', 'like', '%'.$term.'%')->get();
            })->where(function($q) {
                $q->whereIn('type', ['bike', 'frame']);
                $q->where('mbaval', '>', 0);
                $q->where('mbstat', '!=', 80);
            })->whereHas('assortments', function($q) use ($assortments_array) {
                $q->whereIn('oiascd', $assortments_array);
            })->get();

        endif;

        return response()->json($products);
    }

    public function anomalies()
    {
        $products = product::where('mbaval', '>', 0)->where('mbstat', 80)->get();
        return view('products.anomalies', [
            'products' => $products
        ]);
    }
}
