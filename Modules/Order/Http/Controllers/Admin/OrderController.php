<?php


namespace Modules\Order\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Order\Entities\Order;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::all();
        return view('order::admin.index',compact('orders'));
    }
    public function show(Order $order){
        return view('order::admin.show',compact('order'));
    }

    public function update(Request $request,Order $order){
        $order->status = $request->status;
        $order->save();
        return back();
    }
}
