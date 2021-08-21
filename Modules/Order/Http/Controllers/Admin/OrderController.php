<?php


namespace Modules\Order\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Order\Entities\Order;
use Modules\Order\Entities\ReturnRequest;

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
    public function updateReturnStatus(Request $request, ReturnRequest $return){
        $return->status = $request->status;
        $return->save();
        return back();
    }

    public function returns(){
        $returns = ReturnRequest::all();
        return view('order::admin.returns',compact('returns'));
    }

}
