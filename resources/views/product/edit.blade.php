@extends('dashboard.header')
@section('main')
<html>
    <head>
        <title>Product edit page</title>
    </head>
    <body>
        <h2>Edit a new Product</h2>

        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{route('products.update', $product->id)}}" method="post">
            @csrf
            @method('PUT')
            <table>
                <tr>
                    <td><label>Name:</label></td>
                    <td><input type="text" name="name" value="{{$product->name}}"/></td>
                </tr>
                <tr>
                    <td><label>Detail:</label></td>
                    <td><textarea name="detail">{{$product->detail}}</textarea></td>
                </tr> 
                <tr>
                    <td><label>Price:</label></td>
                    <td><input type="text" name="price" value="{{$product->price}}"/></td>
                </tr>
            </table>
            <button type="submit" name="update">Update</button><br/><br/>
        </form>
    <body>
</html>
@endsection


