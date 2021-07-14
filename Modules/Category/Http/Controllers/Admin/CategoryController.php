<?php

namespace Modules\Category\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Category\Entities\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('category::admin.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $categories = Category::all();
        return view('category::admin.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255'
        ]);
        $category = new Category();
        $category->title = $request->title;
        $category->tags = $request->tags;
        $category->user = Auth::user()->id;
        $category->save();
        if (isset($request->parent)) {
            $category->parent = $request->parent;
            $category->update([
                'serial' => Category::find($request->parent)->serial . '.' . $category->id
            ]);
        } else {
            $category->update([
                'serial' => $category->id
            ]);
        }

        return redirect(route('admin.categories.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('category::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('category::admin.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Category $category)
    {
        $category->title = $request->title;
        $category->tags = $request->tags;
        if ($category->parent !== $request->parent) {
            $category->serial = Category::find($request->parent)->serial . '.' . $category->id;
        }
        $category->parent = $request->parent;
        $category->save();
        return redirect(route('admin.categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect(route('admin.categories.index'));
    }
}
