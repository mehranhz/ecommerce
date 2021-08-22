<?php

namespace Modules\Product\Http\Controllers;

use App\Helpers\Agent\Agent;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Category\Entities\Category;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\Variety;

class ProductController extends Controller
{
    public function shop(){
        $products = Product::paginate(20);
        if (Agent::get()->isMobile()){
            return view('product::frontend.mobile.mobileShop',compact('products'));
        }
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('product::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('product::create');
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
    public function show(Product $product)
    {
        $varieties = $product->varieties();
        $category = $product->categories()->latest()->first();
        if (Agent::get()->isMobile()){
            return view('product::frontend.mobile.mobileShow',compact('product','varieties','category'));
        };

        return view('product::frontend.show',compact('product','varieties'));
    }

    public function category(Category $category){
        $products = $category->childsProduct();
//        if (Agent::get()->isMobile()){
            return view('product::frontend.mobile.mobileCategory',compact('products'));
//        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('product::edit');
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
