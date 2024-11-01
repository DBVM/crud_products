<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __invoke(){
        //$produts = product::all(); //con eloquent
        return view('products.index')->with([
            'products'=> Product::all(),
        ]);
    }
    public function create() {
        return view('products.create');
    }
    public function store(){
        $product = product::create(request()->all());
        return redirect()->route('products.index');
    }
    public function show($product){
        $product = Product::findOrFail($product);
        return view('products.show')->with([
            'product' =>$product,
        ]);
    }
    public function edit($product){
        return "Editing product with id {$product}";
    }
    public function update($product){
        $product = product::findOrFail($product);

        $product ->update(request()->all());
        return redirect()->route('products.index');
    }
    public function destroy($product) {
        $product = product::findOrFail($product);
        $product->delete();
        return redirect()->route('products.index');
    }
}
