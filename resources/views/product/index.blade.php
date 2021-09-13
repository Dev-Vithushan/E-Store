@extends('dashboard.header')
@section('main')
<html>
    <head>
        <title></title>
    </head>
    <body>
        <br>
        <button type="submit" name="create_product"><a href="{{route('products.create')}}">Create New Product</a></button>
        
        @if($message = Session::get('success'))
            <h2>{{$message}}</h2>
        @endif
        <br><br>
        <?php  $i=0;  ?>

        <table>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Detail</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->detail}}</td>
                    <td>{{$product->price}}</td>
                    <td>
                        <form action="{{route('products.destroy', $product->id)}}" method="post">
                            @method('DELETE')
                            @csrf
                            <button><a href="{{route('products.show', $product->id)}}">Show</a></button>
                            <button><a href="{{route('products.edit', $product->id)}}">Edit</a></button>
                            <button type="submit" name="delete">Delete</button>
                        </from>
                    </td>
                </tr>
            @endforeach
        </table>
    </body>
</html>
@endsection