<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body>
<h1>{{$product ->title }} ({{$product->id}})</h1>
    <p>Description : {{$product->description }}</p>
    <p>Price: {{$product-> price }}</p>
    <p>Stock: {{$product-> stock }}</p>
    <p>Status: {{$product-> status }}</p>

<!--Tipos de comentarios (html)
{!--blade (se oculta en el navegador--}
@{{$var}}
-->
</body>
</html>