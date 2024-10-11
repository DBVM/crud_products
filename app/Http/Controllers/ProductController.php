<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __invoke(){
        return view('products.index');
    }
    public function create() {
        return 'This is the form to create a prd from controller';
    }
    public function store(){
        //
    }
    public function show($product){
        return "Showing product with id {$product}";
    }
    public function edit($product){
        return "Editing product with id {$product}";
    }
    public function update(){
        //
    }
    public function destroy() {
        //
    }
}
