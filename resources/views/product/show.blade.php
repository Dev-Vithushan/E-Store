@extends('dashboard.header')
@section('main')
<html>
    <head>
        <title></title>
    </head>
    <body>
        <h2>Product Details</h2>
            Name:{{$product->name}}<br/>
            Detail:{{$product->detail}}<br/>
            Price:{{$product->price}}<br/>
    </body>
</html>
@endsection