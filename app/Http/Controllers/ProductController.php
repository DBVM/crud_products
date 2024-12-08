<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function __invoke()
    {
        $products = product::available()->get();
        //$products = product::all(); //con eloquent
        return view('products.index')->with([
            'products' => Product::all(),
        ]);
    }
    public function create()
    {
        return view('products.create');
    }
    public function store()
    {

        $rules = [
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'price' => ['required', 'min:1'],
            'stock' =>  ['required', 'min:0'],
            'status' => ['required', 'in:available,unavailable'],
        ];

        request()->validate($rules);

        if (request()->status == 'available' && request()->stock == 0) {

            return redirect()
                            ->back()
                            ->withErrors('If available must have stock');//reemplaza el session flash;
        }

        
        $product = product::create(request()->all());

        return redirect()
                        ->route('products.index')
                        ->withSuccess("Your new product with id {$product->id} has already stored succesfully");
    }
    public function show($product)
    {
        $product = Product::findOrFail($product);
        return view('products.show')->with([
            'product' => $product,
        ]);
    }
    public function edit($product)
    {

        return view('products.edit')->with([
            'product' => product::findOrFail($product),
        ]);
    }
    public function update($product)
    {
        $rules = [
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'price' => ['required', 'min:1'],
            'stock' =>  ['required', 'min:0'],
            'status' => ['required', 'in:available,unavailable'],
        ];

        request()->validate($rules);

        if (request()->status == 'available' && request()->stock == 0) {

            //session()->flash('error', 'If available must have stock'); //Hace que el error solo esté disponible hasta la siguiente petición

            return redirect()
                            ->back()
                            ->withInput(request()->all())
                            ->withErrors('If available must have stock');//reemplaza el session flash;
                            
        }
        $product = product::findOrFail($product);

        $product->update(request()->all());
        return redirect()
                        ->route('products.index')
                        ->withSuccess("Your new product with id {$product->id} has been updated succesfully");;
    }
    public function destroy($product)
    {
        $product = product::findOrFail($product);
        $product->delete();
        return redirect()
                        ->route('products.index')
                        ->withSuccess("Your new product with id {$product->id} has already deleted succesfully");;
    }
}
