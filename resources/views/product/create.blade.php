@extends('dashboard.header')
@section('main')
<html>
    <head>
        <title>Product add page</title>
    </head>
    <body>
        <h2>Add a new Product</h2>

        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{route('products.store')}}" method="post">
            @csrf
            <table>
                <tr>
                    <td><label>Name:</label></td>
                    <td><input type="text" name="name"/></td>
                </tr>
                <tr>
                    <td><label>Detail:</label></td>
                    <td><textarea name="detail"></textarea></td>
                </tr> 
                <tr>
                    <td><label>Price:</label></td>
                    <td><input type="text" name="price"/></td>
                </tr>
            </table>
            <button type="submit" name="add">Add</button><br/><br/>
        </form>
    <body>
</html>
@endsection


