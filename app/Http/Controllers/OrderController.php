<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class OrderController extends Controller
{
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Order::create($request->all());
        return redirect('placeorder')->with('success', 'Your order has been placed successfully');
    }

    function showall(){
        $datas = DB::table('orders')
            ->join('users', 'orders.customer_id','=','users.id')
            ->join('products', 'orders.product_id','=','products.id')
            ->select('users.name as user_name', 'users.address', 'users.mobile_no', 'products.name', 'products.detail', 'products.price', 'orders.created_at', 'orders.status', 'orders.id')->where('orders.employee_id', Auth::user()->id)
            ->get();
        return view('emporders', compact('datas'));
    }

    function delivered($id){
        $order = Order::find($id);

        $order -> status = 'Delivered';
        $order->save();  
        return back();
    }

    function cancel($id){
        $order = Order::find($id);
        $order->delete();
        return back();
    }
}
