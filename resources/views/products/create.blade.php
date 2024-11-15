@extends('layouts.app')
@section('content')
<h1>Create a product</h1>
<form method="POST" action="{{ route('products.store') }}">
    @csrf
    <div class="form-row">
        <label for="title">Title</label>
        <input class="form-control" type="text" name="title" required>
    </div>
    <div class="form-row">
        <label for="Description">Description</label>
        <input class="form-control" type="text" name="Description" required>
    </div>
    <div class="form-row">
        <label for="Price">Price</label>
        <input class="form-control" type="number" min="1.00" step="0.01" name="Price" required>
    </div>
    <div class="form-row">
        <label for="Stock">Stock</label>
        <input class="form-control" type="number" min="0" name="Stock" required>
    </div>
    <div class="form-row">
        <label for="Status">Status</label>
        <select class="custom-select" name="Status" id="" required>
            <option value="#" selected>Select...</option>
            <option value="available">Available</option>
            <option value="unavailable">Unavailable</option>
        </select>
    </div>
    <div class="form-row mt-3">
        <button type="submit" class="btn btn-primary btn-lg">Create Product</button>
    </div>
    
    
</form>


@endsection