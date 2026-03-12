<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        // Fetch approved reviews with the related product name
        $reviews = Review::where('is_approved', true)
            ->with('product') // if you set up a relationship
            ->latest()
            ->take(3) // limit to 3
            ->get();

        return view('home', compact('products', 'reviews'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product', compact('product'));
    }
}