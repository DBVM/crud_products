@extends('layouts.master')
@section('content')
    

    <h1>Products List</h1>
 
    <a href="{{route('products.create')}}" class="href">Create a product</a>
    @empty($products)
        <div class="alert alert-warning">This list is empty</div>
    @else
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->title}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->stock}}</td>
                            <td>{{$product->status}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
   
    @endempty
@endsection