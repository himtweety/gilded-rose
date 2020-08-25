<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller {

    public function index() {
        return response()->json(Order::with(['product'])->get(), 200);
    }

    public function show(Order $order) {
        return response()->json($order, 200);
    }

    public function buyNow($productId, Request $request) {
        $product = Product::query()->select("*")
                        ->where('id', $productId)
                        ->whereRaw('units > 0')->first();
        if (empty($product->toArray())) {
            return redirect()->route('home')
                                ->with('success', 'quantity not available!');
        }

        if ($request->method() == "POST") {

            try {
                $order = Order::create([
                            'product_id' => $request->get('product_id'),
                            'user_id' => Auth::id(),
                            'address' => $request->get('address')
                ]);

                Product::where('id', $product->id)
                        ->update([
                            'units' => DB::raw('units-1')
                ]);
                return redirect()->route('home')
                                ->with('success', 'Order Placed Successfully!');
            } catch (Exception $ex) {

                return redirect()->route('home')
                                ->with('success', 'Order Placed Successfully!');
            }
        } else {
            return view('details')->with([
                        'product' => $product,
                        'buynow' => true
            ]);
        }
    }

}
