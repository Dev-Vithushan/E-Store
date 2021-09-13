<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Auth;

class UserController extends Controller
{
    function store(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:8'
        ]);

        $user = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'gender' => $request->get('gender'),
            'address' => $request->get('address'),
            'mobile_no' => $request->get('mobile_no'),
            'role' => $request->get('role'),
            'password' => Hash::make($request->get('password'))
        ]);

        $user->save();
        return view('login');
    }

    function admin(){
        return view('dashboard.admin');
    }

    function customer(){
        return view('dashboard.customer');
    }

    function employee(){
        return view('dashboard.employee');
    }

    function placeorder(){
        $products = Product::all();
        return view('placeorder', compact('products'));
    }

    function myorder(){
        $datas = DB::table('orders')
            ->join('users', 'orders.employee_id','=','users.id')
            ->join('products', 'orders.product_id','=','products.id')
            ->select('users.name as user_name', 'products.name', 'products.detail', 'products.price', 'orders.status', 'orders.id')->where('orders.customer_id', Auth::user()->id)
            ->get();
        return view('myorder',compact('datas'));
    }
}
