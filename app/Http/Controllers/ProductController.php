<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('products.index',['products'=>$products]);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name'=>'required',
            'qty'=>'required|numeric',
            'price'=>'required|numeric',
            'category'=>'required'

        ]);

        $newProduct = Product::create($data);

        return redirect(route('products.index'));
    }

    public function edit(Product $product) {
        $products = Product::all();
        return view('products.edit',['edit'=>$product,'products'=>$products]);
   
    }

    public function update(Product $product,Request $request) {
        $data = $request->validate([
            'name'=>'required',
            'qty'=>'required|numeric',
            'price'=>'required|numeric',
            'category'=>'required'

        ]);

        $product->update($data);
        $products = Product::all();
        return view('products.index',['products'=>$products]);
   
    }

    public function delete(Product $product) {

        $product -> delete();
        $products = Product::all();
        return view('products.index',['products'=>$products]);
   
    }
}
