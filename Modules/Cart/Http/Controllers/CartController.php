<?php

namespace Modules\Cart\Http\Controllers;

use App\Helpers\Agent\Agent;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
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
        if (Agent::get()->isMobile()) {
            return view('cart::frontend.mobile.cartMobile');
        }
        return view('cart::frontend.cart');
    }


    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * this function in charge of adding or reducing the number of items in cart
     * an item could be a product or a variety of a product
     */
    public function add(Request $request, $id)
    {
        $number = $request->number ?? 0;

        /* get the requested item from database
        * also if the item is a variety of a product get the product itself
        */
        $type = strtolower($request->type) == 'variety' ? 'variety' : 'product';
        $item = $type == 'variety' ? Variety::find($id) : Product::find($id);


        /*
         * adding item to cart or increase its quantity if it already exists in cart
         */
        if (Cart::has($item)) {

            $quantity = isset($request->quantity) ?? 1;
            $cartItem = Cart::get($item);

            /*
             * prevent negative or zero quantity
             * */
            if ($number < 0 && $cartItem['quantity'] <= 1) {
                return redirect(route('cart.index'));
            }

            /* update item quantity */
            if ($item->inventory >= $cartItem['quantity'] + $number) {
                Cart::update($item, $number == 0 ? 1 : $number);
            }

            return redirect(route('cart.index'));
            // if item doesn't exist in cart add it
        }
        $item = [
            'id' => Str::random(10),
            'quantity' => 1,
            'subject_id' => $item->id,
            'subject_class' => get_class($item),
        ];
        Cart::put($item);

        return redirect(route('cart.index'));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function quantityChange(Request $request)
    {

        $data = $request->validate([
            'quantity' => 'required|digits_between:1,3',
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

        }
        return response(['status' => error], 404);

    }


    /**
     * @param $item
     * @return \Illuminate\Http\RedirectResponse
     */
    public
    function removeItem($item)
    {
        Cart::delete($item);
        return back();
    }


}
