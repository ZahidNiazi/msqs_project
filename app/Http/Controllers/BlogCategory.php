<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class BlogCategory extends Controller
{
    public function index(){
        $categories = BlogCategory::all();

    }


}
