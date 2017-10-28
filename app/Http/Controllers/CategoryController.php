<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Session;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::orderBy('name','asc')->paginate(env('PER_PAGE'));
        return view('categories.index', compact('categories'));
    }

    public function readData()
    {
        $categories = Category::orderBy('name','asc')->paginate(env('PER_PAGE'));
        return view('categories.detailsList', compact('categories'));
    }


    public function getListcategory()
    {
        $categories = Category::orderBy('name','asc')->get();
        //return response()->json(array('data'=> $categories));
    }

    public function getCategoryData(Request $request){

        if ($request -> ajax())
        {
            $category=Category::find($request->id);
            return response()->json($category);
        }

    }

    public function newUpdatedata(Request $request){

        if ($request -> ajax())
        {
            $category = Category::find($request->category_id);
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

    public function exportCategory(){

        $categories = Category::orderBy('name','asc')->get();

        return Excel::create('data_category',function ($excel) use ($categories){
            $excel->sheet('mysheet', function ($sheet) use ($categories){
                $sheet->fromArray($categories);
            });
        })->download('xlsx');

    }

    public function findCategoryPage()
    {
        $categories = Category::orderBy('name','asc')->paginate(5);
    }

    public function paginateCategory()
    {
        $categories = $this-> findCategoryPage();

        return view('categories.paginate', compact('categories'));
    }

}
