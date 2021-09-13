@extends('dashboard.header')
@section('main')
<html>
    <head>
        <title></title>
    </head>
    <body>
        <br>
        <button type="submit" name="create_product"><a href="{{route('employees.create')}}">Enroll new Employee</a></button>
        <br><br>
        @if($message = Session::get('success'))
            <h2>{{$message}}</h2>
        @endif
        
        <?php  $i=0;  ?>
    
        <table>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Actions</th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->mobile_no}}</td>
                    <td>
                        <form action="{{route('employees.destroy', $user->id)}}" method="post">
                            @method('DELETE')
                            @csrf
                            <button><a href="{{route('employees.show', $user->id)}}">Show</a></button>
                            <button><a href="{{route('employees.edit', $user->id)}}">Edit</a></button>
                            <button type="submit" name="delete">Delete</button>
                        </from>
                    </td>
                </tr>
            @endforeach
        </table>
    </body>
</html>
@endsection