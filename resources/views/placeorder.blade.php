@extends('dashboard.header')
@section('main')
    <html>
        <head>
            <title></title>
        </head>
        <body>
            @if($message = Session::get('success'))
                <strong>{{$message}}</strong>
            @endif
            <br>
            <?php $i=0 ?>
            <table>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Detail</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                @foreach($products as $product)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->detail}}</td>
                    <td>{{$product->price}}</td>
                    <td>
                        <button type="submit" name="place_order"><a href="{{route('order', [ 'id' => $product -> id])}}">Place order</a></button>
                    </td>
                </tr>
                @endforeach
            </table>
        </body>
    </html>
@endsection