<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = Product::paginate(10);
        return view('products.create',['product' => $product]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = $request->validate(['name' => 'required|string']);
        Product::create($product);
        return back()->with('done', 'done');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate(['name' => 'required|string']);
        $product = Product::find($id);
        $product->name = $request->name;
        $product->save();
        return \redirect()->route('product.create')->with('done', 'done');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return back()->with('done','done');
    }
}
