@extends('layouts.app')
@section('content')

<h1>{{$product ->title }} ({{$product->id}})</h1>
    <p>Description : {{$product->description }}</p>
    <p>Price: {{$product-> price }}</p>
    <p>Stock: {{$product-> stock }}</p>
    <p>Status: {{$product-> status }}</p>

<!--Tipos de comentarios (html)
{!--blade (se oculta en el navegador--}
@{{$var}}
-->
@endsection