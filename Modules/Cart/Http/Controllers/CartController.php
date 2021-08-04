<?php

namespace Modules\Cart\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Cart\Services\Cart;
use Modules\Order\Entities\Order;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\Variety;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('cart::frontend.cart');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('cart::create');
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
    public function show($id)
    {
        return view('cart::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('cart::edit');
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

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function add(Request $request, $id)
    {

        if ($request->type == 'variety') {
            $type = 'variety';
            $variety = Variety::find($id);
            $product = Product::find($variety->parent);
            $item = ['product' => $product, 'variety' => $variety];
        } else {
            $type = 'product';
            $product = Product::find($id);
            $item = ['product' => $product, 'variety' => null];
        }

        if (Cart::has($item[$type])) {
            $quantity = isset($request->quantity) ?? 1;
            $cartItem = Cart::get($item[$type]);
            if ($item[$type]->inventory >= $cartItem['quantity'] + 1) {
                Cart::update($item[$type], 1);
            }
        } else {
            Cart::put($item, [
                'quantity' => 1,
                'price' => $item['variety'] == null ? $product->basePrice : $variety->basePrice,
                'specifications' => isset($variety) ? $variety->specifications : null
            ]);
        }
        return redirect(route('cart.index'));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function quantityChange(Request $request)
    {

        $data = $request->validate([
            'quantity' => 'required',
            'id' => 'required',
        ]);

        if (Cart::has($data['id'])) {
            $item = Cart::get($data['id'], true);
            $type = isset($item['Variety']) ? 'Variety' : 'Product';

            if ($item[$type]->inventory >= $data['quantity']) {
                Cart::update($data['id'], [
                    'quantity' => $data['quantity']
                ]);
            }

            return response(['status' => 'success'], 200);

        } else {
            return response(['status' => error], 404);
        }
    }

    public function removeItem($item){
        Cart::delete($item);
        return back();
    }

    public function register(Request $request){
        $prevOrders = Order::where('status','unpaid')->where('user_id',auth()->user()->id)->get();
        foreach ($prevOrders as $prevOrder){
            $prevOrder->delete();
        }


        $cart = Cart::all();
        if ($cart->count()){
            $price = $cart->sum(function ($item){
                $type = isset($item['Variety'])?'Variety':'Product';
                return $item[$type]->basePrice * $item['quantity'];
            });
            $order = auth()->user()->orders()->create([
                'status'=>'unpaid',
                'price'=>$price,
            ]);


                DB::table('item_order')->insertOrIgnore((array)$cart->map(function ($cartItem) use ($order):array {
                    $itemType = isset($cartItem['Variety'])?'Variety':'Product';
                    return [
                        'order_id'=>$order->id,
                        'item_id'=>$cartItem[$itemType]->id,
                        'item_type'=>$itemType,
                        'quantity'=>$cartItem["quantity"]
                        ];
                })->toArray());
                return redirect(route('order.show',['order'=>$order->id]));

        }
    }
}
