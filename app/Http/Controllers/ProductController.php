<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){

        $products = Product ::all();
        return response() -> json ([
            'products' => $products
        ]);
        dd($products);
    }

    public function store(Request $request)
    {
        Product::create([
        "name" => $request->name,
        "price" => $request->price
        ]);

        $added_product = Product::latest()->first();

        return response() -> json ($added_product);
    }

    public function update($id, Request $request)
    {
    $product = Product::findOrFail($id);
    $product->update($request->all());

    return redirect()->back()->with('success', 'تم');
    }
}
