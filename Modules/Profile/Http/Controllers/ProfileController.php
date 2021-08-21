<?php

namespace Modules\Profile\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Order\Entities\Order;
use Modules\Order\Entities\ReturnRequest;

class ProfileController extends Controller
{


    public function myOrders(){
        $orders = auth()->user()->orders->where('address_id','!=',null);
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
