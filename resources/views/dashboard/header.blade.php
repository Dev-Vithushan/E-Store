<html>
    <head>
        <title>Dashboard page</title>
    </head>
    <body>
        <h2>E-Store</h2>
        @if(Auth::user()->role=='admin')
            <table>
                <tr>
                    <td><a href="{{url('admin')}}">{{Auth::user()->name}}</a></td>
                    <td><a href="{{route('products.index')}}">Product</a></td>
                    <td><a href="{{route('employees.index')}}">Employee</a></td>
                    <td><a href="{{url('logout')}}">Logout</a></td>
            </table>
        @endif
        @if(Auth::user()->role=='employee')
            <table>
                <tr>
                    <td><a href="{{url('employee')}}">{{Auth::user()->name}}</a></td>
                    <td><a href="{{url('emporders')}}">My Orders</a></td>
                    <td><a href="{{url('reset')}}">Reset Password</a></td>
                    <td><a href="{{url('logout')}}">Logout</a></td>
            </table>
        @endif
        @if(Auth::user()->role=='customer')
            <table>
                <tr>
                    <td><a href="{{url('customer')}}">{{Auth::user()->name}}</a></td>
                    <td><a href="{{url('placeorder')}}">Place Orders</a></td>
                    <td><a href="{{url('myorder')}}">My Orders</a></td>
                    <td><a href="{{url('logout')}}">Logout</a></td>
            </table>
        @endif
        @yield('main')
    </body> 
</html>