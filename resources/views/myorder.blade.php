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
                    <th>Delivery Person</th>
                    <th>Status</th>
                </tr>
                @foreach($datas as $data)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->detail}}</td>
                    <td>{{$data->price}}</td>
                    <td>{{$data->user_name}}</td>
                    <td>
                        @if($data->status=='Delivered')
                            <p>Delivered</p>
                        @endif
                        @if($data->status=='Cancel order')
                            <button><a href="{{route('cancel', ['id' => $data->id])}}">{{$data->status}}</a></button>
                        @endif
                        
                    </td>
                    <td>
                        
                    </td>
                </tr>
                @endforeach
            </table>
        </body>
    </html>
@endsection