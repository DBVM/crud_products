@extends('layouts.app')
@section('content')
<h1>Edit a product</h1>
<form method="POST" action="{{ route('products.update',['product' => $product ->id]) }}">
    @csrf
    @method('PUT')
    <div class="form-row">
        <label for="title">Title</label>
        <input class="form-control" type="text" name="title" value ="{{ old('title') ?? $product->title}}" required>
    </div>
    <div class="form-row">
        <label for="description">Description</label>
        <input class="form-control" type="text" name="description" value ="{{ old('title') ?? $product->description}}"required>
    </div>
    <div class="form-row">
        <label for="price">Price</label>
        <input class="form-control" type="number" min="1.00" step="0.01" name="price" value ="{{ old('title') ?? $product->price}}" required>
    </div>
    <div class="form-row">
        <label for="stock">Stock</label>
        <input class="form-control" type="number" min="0" name="stock" value ="{{ old('title') ?? $product->stock}}" required>
    </div>
    <div class="form-row">
        <label for="status">Status</label>
        <select class="custom-select" name="status" id="" required>
            <option {{ old('status') == 'available' ? 'selected' : ($product ->status == 'unavailable' ? 'selected' : '')}} value="unavailable">Unavailable</option>
            <option {{ old('status') == 'available' ? 'selected' : ($product ->status == 'available' ? 'selected' : '')}} value="available">Available</option>
        </select>
    </div>
    <div class="form-row mt-3">
        <button type="submit" class="btn btn-primary btn-lg">Update Product</button>
    </div>
    
    
</form>

@endsection