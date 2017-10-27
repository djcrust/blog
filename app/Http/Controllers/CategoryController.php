<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Session;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::orderBy('name','asc')->get();
        return view('categories.index', compact('categories'));
    }

    public function getListcategory()
    {
        $categories = Category::orderBy('name','asc')->get();
        return response()->json(array('data'=> $categories));
    }

    public function getUpdatedata(Request $request){

        if ($request -> ajax())
        {
            $category=Category::find($request->id);
            return response($category);
        }

    }

    public function newUpdatedata(Request $request){

        if ($request -> ajax())
        {
            $category = Category::find($request->id);
            $category->name = $request->category_name;
            $category->save();
            return response($category);
        }

    }

    public function createCategory(Request $request){

        if($request->ajax()){
            $category = new Category;
            $category->name = $request->category_name;
            $category->save();
            return response()->json($category);
        }

    }

    public function deleteCategory(Request $request){

        if($request->ajax()){
            $category = Category::find($request->id);
            $category->delete();
            return response()->json(['data' => 'Category has been deleted with successfully!']);
        }

    }


}
