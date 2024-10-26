@extends('layouts.master')
@section('content')
<h1>Edit a product</h1>
<form method="POST" action="{{ route('products.update',['product' => $product ->id]) }}">
    @csrf
    @method('PUT')
    <div class="#">
        <label for="title">Title</label>
        <input class="" type="text" name="title" value ="{{$product->title}}" required>
    </div>
    <div class="#">
        <label for="description">Description</label>
        <input class="" type="text" name="description" value ="{{$product->description}}"required>
    </div>
    <div class="#">
        <label for="price">Price</label>
        <input class="" type="number" min="1.00" step="0.01" name="price" value ="{{$product->price}}" required>
    </div>
    <div class="#">
        <label for="stock">Stock</label>
        <input class="" type="number" min="0" name="stock" value ="{{$product->stock}}" required>
    </div>
    <div class="#">
        <label for="status">Status</label>
        <select name="status" id="" required>
            <option {{ $product ->status == 'available' ? 'selected' : ''}} value="available">Available</option>
            <option {{ $product ->status == 'unavailable' ? 'selected' : ''}} value="unavailable">Unavailable</option>
        </select>
    </div>
    <div>
        <button type="submit" class="#">Update Product</button>
    </div>
    
    
</form>

@endsection