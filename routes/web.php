<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//--------Vista principal
/*Route::get('/', function () {
    return view('welcome');
})->name('main');*/


Route::get('/', MainController::class)->name('main');


//--------Lista completa de productos

/*Route::get('products', function () {
    //return view('welcome');
    return 'This is the list of products';
})->name('products.index');
*/
Route::get('products',ProductController::class)->name('products.index');


//--------Añadir un producto

/*Route::get('products/create', function () {
    //return view('welcome');
    return 'This is the form to create a product';
})->name('products.create');  */


Route::get('products/create',[ProductController::class, 'create'])->name('products.create');



//-------Petición de tipo post
Route::post('products', function () {
    //
})->name('products.store');

//--------Mostrar detalles del producto
/*Route::get('products/{product}', function ($product) {
    //return view('welcome');
    return "Showing product with id {$product}";
})->name('products.show');*/
Route::get('products/{product}',[ProductController::class, 'show'])->name('products.show');;


//--------Editar el producto
/*Route::get('products/{product}/edit', function ($product) {
    //return view('welcome');
    return "Editing product with id {$product}";
})->name('products.show');*/

Route::get('products/{product}/edit',[ProductController::class, 'edit'])->name('products.show');
//--------
Route::match(['put','patch'], 'products/{product}', function ($product) {
   //
})->name('products.update');
//--------delete
Route::delete('products/{product}', function ($product){
    //
})->name('products.destroy');