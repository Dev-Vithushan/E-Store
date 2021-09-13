@extends('dashboard.header')
@section('main')
<html>
    <head>
        <title>Employee edit page</title>
    </head>
    <body>
        <h2>Edit an Employee</h2>

        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{route('employees.update', $user->id)}}" method="post">
            @csrf
            @method('PUT')
            <table>
                <tr>
                    <td><label>Name:</label></td>
                    <td><input type="text" name="name" value="{{$user->name}}"/></td>
                </tr>
                <tr>
                    <td><label>Email:</label></td>
                    <td><input type="text" name="email" value="{{$user->email}}"/></td>
                </tr>
                <tr>
                    <td><label>Gender:</label></td>
                    <td><select name="gender" value="{{$user->gender}}"> 
                        <option></option>
                        <option>m</option>
                        <option>f</option>
                        </select></td>
                </tr>
                <tr>
                    <td><label>Address:</label></td>
                    <td><input type="text" name="address" value="{{$user->address}}"/></td>
                </tr>
                <tr>
                    <td><label>Mobile No:</label></td>
                    <td><input type="tel" name="mobile_no" value="{{$user->mobile_no}}"/></td>
                </tr>
            </table>
            <button type="submit" name="update">Update</button><br/><br/>
        </form>
    <body>
</html>
@endsection