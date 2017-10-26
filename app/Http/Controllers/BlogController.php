<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function getIndex(){

        $posts = Post::orderBy('id','asc')->paginate(8);

        return view('blog.index',compact('posts'));

    }

    public function getSingle($slug){

        $post = Post::where('slug','=', $slug)->first();

        return view('blog.single',compact('post'));

    }
}
