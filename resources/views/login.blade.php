<html>
    <head>
        <title>Login page</title>
    </head>
    <body>
        <h2>E-Store</h2>

        @if($message = Session::get('error'))
            <strong>{{ $message }}</strong><br/>
        @endif   

        @if($errors->any()) 
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul><br/>
        @endif

        <form action="{{ url('checklogin') }}" method="post">
            @csrf
            <table>
                <tr>
                    <td><label>Email:</label></td>
                    <td><input type="text" name="email"/></td>
                </tr>
                <tr>
                    <td><label>Password:</label></td>
                    <td><input type="password" name="password"/></td>
                </tr>
            </table>
            <button type="submit" name="login">Login</button><br/><br/>
        </form>
        <form action="{{ url('register') }}" method="get">
            @csrf
            <button type="submit" name="login">Register Now!</button><br/><br/>
        </form>
    </body>
</html>