<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware("auth:admin")->except([
            "index", "show"
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("admin.Categories.index")->with([
           "categories" =>Category::latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.Categories.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        $request->validate([
            "title" =>"required|min:3"
        ]);
        //add category
        $title = $request->title;
        Category::create([
            "title" =>$title,
            "slug"  =>Str::slug($title)
        ]);
       return redirect()->route("categories.index")->with([
           "success" => "Category Inserted successfully"
       ]);
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
    public function edit(Category $category)
    {
        //
        return view("admin.Categories.edit")->with([
            "category"=>$category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
         //validate
         $request->validate([
            "title" =>"required|min:3"
        ]);
        //add category
        $title = $request->title;
        $category->update([
            "title" =>$title,
            "slug"  =>Str::slug($title)
        ]);
       return redirect()->route("categories.index")->with([
           "success" => "Category changed successfully"
       ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //delete cat
        $category->delete();
       return redirect()->route("categories.index")->with([
           "success" => "Category deleted successfully"
       ]);
    }
}
