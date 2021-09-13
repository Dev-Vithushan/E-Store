@extends('dashboard.header')
@section('main')
<html>
    <head>
        <title>Order page</title>
    </head>
    <body>
        <form action="{{route('orders.store')}}" method="post">
            @csrf
            <table>
                <tr>
                    <td><label>Product Name:</label></td>
                    <td><input type="text" name="name" value="{{$product->name}}"/></td>
                </tr>
                <tr>
                    <td><label>Employee Name:</label></td>
                    <td><select name="employee_id">
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                    </select></td>
                </tr> 
                <tr>
                    <td><label>Price:</label></td>
                    <td><input type="text" name="price" value="{{$product->price}}"/></td>
                </tr>
                <input type="hidden" name="product_id" value="{{$product->id}}"/>
                <input type="hidden" name="customer_id" value="{{Auth::user()->id}}"/>
                <input type="hidden" name="status" value="Cancel order"/>
            </table>
            <button type="submit" name="order">Order</button><br/><br/>
        </form>
    </body>
</html>
@endsection