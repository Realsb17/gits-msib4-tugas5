<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Product::all();
        return view('pages.product.index',compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('pages.product.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'name' => 'required|unique:products,name',
            'description' => 'required',
            'photo' => 'required|image',
            'price' => 'required|integer',
            'categories_id' => 'required',
        ]);
        $validated['photo'] = $request->file('photo')->store('image', 'public');
        $validated['slug'] = Str::slug($request->name);
        Product::create($validated);
        return redirect()->route('product.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::all();
        $items = Product::findOrFail($id);
        return view('pages.product.edit',compact('items','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    $validated = $request->validate([
        'name' => 'string|required|unique:products,name,'.$id,
        'description' => 'required|string',
        'photo' => 'image',
        'price' => 'integer|required',
        'categories_id' => 'required',
    ]);

    $request->file('photo') != NULL ? $validated['photo'] = $request->file('photo')->store('image', 'public') : '' ;

    $validated['slug'] = Str::slug($validated['name']);

    Product::find($id)->update($validated);

    return redirect()->route('product.index');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = Product::find($id);
        $deleted->delete();
        return back();
    }
}
