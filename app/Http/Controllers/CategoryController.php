<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Category::all();
        return view('pages.category.index',compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.category.create');
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
            'name' => 'required|unique:categories,name',
            'description' => 'required',
            'icon' => 'required|image',
        ]);
        $validated['icon'] = $request->file('icon')->store('image', 'public');
        $validated['slug'] = Str::slug($request->name);
        Category::create($validated);
        return redirect()->route('category.index');

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
        $items = Category::findOrFail($id);
        return view('pages.category.edit',compact('items'));
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
            'name' => 'string|required|unique:categories,name,'.$id,
            'description' => 'required',
            'icon' => 'image',
        ]);
        $request->file('icon') == !NULL ? $validated['icon'] = $request->file('icon')->store('image', 'public') : '' ;
        $validated['slug'] = Str::slug($request->name);
        Category::find($id)->update($validated);
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $cek = Category::where('id','1');
        // if($cek){
        //     Category::where('id',1)->update(['name'=>'uncategory'],['slug'=>'uncategory']);
        // }else{

        // }
        $deleted = Category::find($id);
        $deleted->delete();
        return back();

    }
}
