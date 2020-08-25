<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller {

    public function index() {
        return view('home')->with([
                    'products' => Product::all()
        ]);
//        return response()->json(Product::all(), 200);
    }

    public function show(Product $product) {
        return view('details')->with([
                    'product' => $product
        ]);
//        return response()->json($product, 200);
    }

}
