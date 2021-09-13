@extends('dashboard.header')
@section('main')
    <html>
        <head>
            <title></title>
        </head>
        <body>
            <br>
            <?php $i=0 ?>
            <table>
                <tr>
                    <th>No</th>
                    <th>Product Name</th>
                    <th>Detail</th>
                    <th>Price</th>
                    <th>Customer Name</th>
                    <th>Customer Address</th>
                    <th>Customer mobile no</th>
                    <th>Date</th>
                    <th>Delivered</th>
                </tr>
                @foreach($datas as $data)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->detail}}</td>
                    <td>{{$data->price}}</td>
                    <td>{{$data->user_name}}</td>
                    <td>{{$data->address}}</td>
                    <td>{{$data->mobile_no}}</td>
                    <td>{{$data->created_at}}</td>
                    <td>
                        @if($data->status=='Delivered')
                            <p>Delivered</p>
                        @endif
                        @if($data->status=='Cancel order')
                            <button><a href="{{route('delivery', ['id' => $data->id])}}">Yes</a></button>
                        @endif

                    </td>
                </tr>
                @endforeach
            </table>
        </body>
    </html>
@endsection