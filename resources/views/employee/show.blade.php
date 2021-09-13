@extends('dashboard.header')
@section('main')
<html>
    <head>
        <title>Employee details page</title>
    </head>
    <body>
        <h2>Details of Employee</h2>
            Name:{{$user->name}}<br/>
            Email:{{$user->email}}<br/>
            Gender:{{$user->gender}}<br/>
            Address:{{$user->address}}<br/>
            Mobile No:{{$user->mobile_no}}<br/>
    </body>
</html>
@endsection