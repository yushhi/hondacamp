<?php

namespace App\Http\Controllers;

use App\Category;
use App\Subcategory;
use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    public function getJenisMobil()
    {
        $jenismobils = DB::table('categories')->pluck("categoryname","id");
        return view('auth.register',compact('jenismobils'));
    }

     public function getTipeMobil($id) 
    {        
        $subcategories = DB::table("subcategories")->where("category_id",$id)->pluck("subcategoryname","id");
        return json_encode($subcategories);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get();
        return view('admin.view-category')->with('categories', $categories);
    }

    public function tes()
    {
        $categories = Category::get();
        return view('auth.register')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create-category-mobil');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'categoryname' => 'required|max:255'
        ]);

        $category = new Category();
        $category->categoryname = $request['categoryname'];
        $category->slug = str_slug($request['categoryname']);
        $latestSlug = Category::whereRaw("slug RLIKE '^{$category->slug}(-[0-9]*)?$'")
            ->latest('id')
            ->value('slug');
                if ($latestSlug) {
                    $pieces = explode('-', $latestSlug);
                    $number = intval(end($pieces));
                    $category->slug .= '-' . ($number + 1);
                }
                $category->save();
                return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::findorfail($id);
        return view('admin.edit-category', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category)
    {
        $category = Category::findorfail($id);
        $category->update($request->all());

        Category::where('id', $id)->update([
            'categoryname' => $request->categoryname,
        ]);
        
        return redirect('dashboard')->with('statusGroup', 'Data Berhasil Dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
