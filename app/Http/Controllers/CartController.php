<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "price" => $product->price_30ml,
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back();
    }

    public function index()
    {
        $cart = session()->get('cart');
        return view('cart', compact('cart'));
    }
}