<?php

namespace Modules\Profile\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Order\Entities\Order;
use Modules\Order\Entities\ReturnRequest;
use Modules\Product\Entities\Product;

class ProfileController extends Controller
{
    public function setReminder(Product $product){
        $user = auth()->user();
        if ($user !== null){
            DB::table('user_product')->insert([
                'user_id'=>$user->id,
                'product_id'=>$product->id,
                'type'=>'reminder'
            ]);
        }
        return true;
    }

    public function unsetReminder(Product $product){
        if ($product->hasReminder()){
            $product->unsetReminder();
        }
        return true;
    }

    public function saveProduct(Product $product){
        $user = auth()->user();
        if ($user !== null){
            DB::table('user_product')->insert([
                'user_id'=>$user->id,
                'product_id'=>$product->id,
                'type'=>'save'
            ]);
        }
        return true;
    }

    public function deleteProduct(Product $product){
        if($product->savedItem()){
            $product->unlink();
        }
        return true;
    }

    public function myOrders(){
        $orders = auth()->user()->orders->where('address_id','!=',null)->sortByDesc('created_at');
        return view('profile::frontend.mobile.orders',compact('orders'));
    }

    public function returnalbes(){
        $orders = Order::where('status','received')->get();
        $returnables=[];
        foreach ($orders as $order){
            if (! ReturnRequest::where('order_id',$order->id)->first()){
                $returnables [] = $order;
            }
        }
        return view('profile::frontend.mobile.returnables',compact('returnables'));
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('profile::frontend.mobile.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('profile::create');
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
        return view('profile::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('profile::edit');
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
