<html>
    <head>
        <title>Register page</title>
    </head>
    <body>
        <h2>Customer Registration</h2>
        @if($errors->any()) 
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul><br/>
        @endif

        <form action="{{url('store')}}" method="post">
            @csrf
            <table>
                <tr>
                    <td><label>Name:</label></td>
                    <td><input type="text" name="name"/></td>
                </tr>
                <tr>
                    <td><label>Email:</label></td>
                    <td><input type="text" name="email"/></td>
                </tr>
                <tr>
                    <td><label>Gender:</label></td>
                    <td><select name="gender">
                        <option></option>
                        <option>m</option>
                        <option>f</option>
                        </select></td>
                </tr>
                <tr>
                    <td><label>Address:</label></td>
                    <td><input type="text" name="address"/></td>
                </tr>
                <tr>
                    <td><label>Mobile No:</label></td>
                    <td><input type="tel" name="mobile_no"/></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="role" value="customer"/></td>
                </tr>
                <tr>
                    <td><label>Password:</label></td>
                    <td><input type="password" name="password"/></td>
                </tr>
            </table>
            <button type="submit" name="signup">Signup</button><br/><br/>
        </form>
    </body>
</html>