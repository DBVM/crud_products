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

        $rules = [
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'price' => ['required', 'min:1'],
            'stock' =>  ['required', 'min:0'],
            'status'=> ['required', 'in:available,unavailable'],
        ];

        request()->validate($rules);

        if(request()->status == 'available' && request()->stock == 0){
    
        session()->flash('error','If available must have stock');
        return redirect()->back();
       }
       
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
        $rules = [
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'price' => ['required', 'min:1'],
            'stock' =>  ['required', 'min:0'],
            'status'=> ['required', 'in:available,unavailable'],
        ];

        request()->validate($rules);
        
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
