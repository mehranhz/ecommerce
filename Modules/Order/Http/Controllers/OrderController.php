<?php

namespace Modules\Order\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Cart\Services\Cart;
use Modules\Order\Entities\Order;

class OrderController extends Controller
{
    public function register(Request $request)
    {
        $prevOrders = Order::where('status', 'unpaid')->where('user_id', auth()->user()->id)->get();
        foreach ($prevOrders as $prevOrder) {
            $prevOrder->delete();
        }


        $cart = Cart::all();
        if ($cart->count()) {
            $price = Cart::price();
            $order = auth()->user()->orders()->create([
                'status' => 'unpaid',
                'price' => $price,
            ]);


            DB::table('item_order')->insertOrIgnore((array)$cart->map(function ($cartItem) use ($order): array {
                $itemType = isset($cartItem['Variety']) ? 'Variety' : 'Product';
//                if ($cartItem["price"] != $cartItem[$itemType]->basePrice ){
//                   $this->removeItem($cartItem);
//                    alert()->message('قیمت یکی از کالاهای سبد خرید شما تغییر کرده .');
//                }

                return [
                    'order_id' => $order->id,
                    'item_id' => $cartItem[$itemType]->id,
                    'item_type' => $itemType,
                    'price'=>$cartItem["price"] - (($cartItem["price"]/100) *$cartItem["$itemType"]->discount),
                    'quantity' => $cartItem["quantity"]
                ];
            })->toArray());
            return redirect(route('order.show', ['order' => $order->id]));

        }
    }

    public function addAddress(Request $request,Order $order){

        $order->address_id = $request->address_option;
        $order->save();

        return redirect(route('order.payment',['order'=>$order->id]));
    }

    public function payment(Order $order){
        return view('order::frontend.payment',compact('order'));
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('order::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('order::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Order $order)
    {
        return view('order::frontend.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('order::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
