<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class IndexPageController extends Controller
{
    public function index() {
        $blogs= Blog::orderBy('created_at','DESC')->get();
        return view('blogs',[
            'blogs'=>$blogs
        ]);
    }

}
