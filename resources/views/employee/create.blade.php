<html>
    <head>
        <title>Employee enroll page</title>
    </head>
    <body>
        <h2>Enroll a new Employee</h2>
        <form action="{{route('employees.store')}}" method="post">
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
                    <td><input type="hidden" name="role" value="employee"/></td>
                </tr>
                <tr>
                    <td><label>Password:</label></td>
                    <td><input type="password" name="password"/></td>
                </tr>
            </table>
            <button type="submit" name="enroll">Enroll</button><br/><br/>
        </form>
    </body>
</html>