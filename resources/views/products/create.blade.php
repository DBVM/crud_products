@extends('layouts.app')
@section('content')
<h1>Create a product</h1>
<form method="POST" action="{{ route('products.store') }}">
    @csrf
    <div class="#">
        <label for="title">Title</label>
        <input class="" type="text" name="title" required>
    </div>
    <div class="#">
        <label for="Description">Description</label>
        <input class="" type="text" name="Description" required>
    </div>
    <div class="#">
        <label for="Price">Price</label>
        <input class="" type="number" min="1.00" step="0.01" name="Price" required>
    </div>
    <div class="#">
        <label for="Stock">Stock</label>
        <input class="" type="number" min="0" name="Stock" required>
    </div>
    <div class="#">
        <label for="Status">Status</label>
        <select name="Status" id="" required>
            <option value="#" selected>Select...</option>
            <option value="available">Available</option>
            <option value="unavailable">Unavailable</option>
        </select>
    </div>
    <div>
        <button type="submit" class="#">Create Product</button>
    </div>
    
    
</form>


@endsection