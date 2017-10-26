<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{

    public function Index(){
        return view('page.welcome');
    }

    public function getAbout()
    {
        $first_name = 'Lucile';
        $last_name = 'Bezandry';
        $full_name = $first_name . " " . $last_name;


        $data = [];
        $data['email'] = 'djcrust@gmail.com';
        $data['full_name'] = $full_name;

        return view('page.about',compact('data'));
    }

    public function getContact(){
        return view('page.contact');
    }

}
