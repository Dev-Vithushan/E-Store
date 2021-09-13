@extends('dashboard.header')
@section('main')
<html>
    <head>
        <title>Reset page</title>
    </head>
    <body>
        <h2>Reset your password</h2>

        @if($message = Session::get('error'))
            <strong>{{$message}}</strong>
        @endif

        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul><br/>
        @endif

        <form action="{{url('restore')}}" method="post">
            @csrf
            <table>
                <tr>
                    <td><label>Current Password:</label></td>
                    <td><input type="password" name="current_password"/></td>
                </tr>
                <tr>
                    <td><label>New Password:</label></td>
                    <td><input type="password" name="new_password"/></td>
                </tr>
                <tr>
                    <td><label>Confirm new Password:</label></td>
                    <td><input type="password" name="confirm_password"/></td>
                </tr>
            </table>
            <button type="submit" name="change">Change</button><br/><br/>
        </form>
    </body>
</html>
@endsection