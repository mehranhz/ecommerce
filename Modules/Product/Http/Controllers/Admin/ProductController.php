<?php

namespace Modules\Product\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Category\Entities\Category;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\Variety;
use Modules\Product\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $accessories = Product::where('type', 'accessory')->paginate(5);
        $products = Product::where('type', 'product')->paginate(5);
        return view('product::admin.index', compact('products', 'accessories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $categories = Category::all();
        return view('product::admin.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(StoreProductRequest $request)
    {

        $product = new Product();
        $product->title = $request->title;
        $product->inventory = $request->inventory;
        $product->basePrice = $request->basePrice;
        $product->discount = $request->discount;
        $product->thumbnail = $request->thumbnail;
        $product->user_id = Auth::user()->id;
        $product->available = $request->inventory > 0;
        $product->specifications = $request->specifications;
        if (isset($request->parent)) {
            $product->product_id = $request->parent;
            $product->type = 'accessory';
        }
        $product->save();
        $product->categories()->sync($request->categories);
        return redirect(route('admin.products.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Product $product)
    {
        $accessories = Product::where('product_id', $product->id)->get();
        $varieties = Variety::where('parent', $product->id)->get()->toArray();

        $varieties = array_map(function ($variety) {
             $variety['specifications']=array_map(function ($specification) {
                return explode(':', $specification);
            }, explode("\n", $variety['specifications']));
             return $variety;
        }, $varieties);

        $product->specifications = array_map(function ($item) {
            return explode(':', $item);
        }, explode("\n", $product->specifications));

        return view('product::admin.show', compact('product', 'accessories', 'varieties'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('product::admin.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(StoreProductRequest $request, Product $product)
    {
        $product->update($request->all());
        $product->categories()->sync($request->categories);
        return redirect(route('admin.products.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('admin.products.index'));
    }

    public function addVariety(Request $request)
    {
        $variety = new Variety();
        $variety->basePrice = $request->price;
        $variety->discount = $request->discount;
        $variety->inventory = $request->inventory;
        $variety->specifications = $request->v_specifications;
        $variety->parent = $request->parent;
        $variety->save();
        return redirect(route('admin.products.show', ['product' => $request->parent]));
    }
}
