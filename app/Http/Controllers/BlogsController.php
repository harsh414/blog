<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function create() {
        return view('blogCrud.addblog');
    }


    public function store(Request $request) {
        $request->validate([
            'title'=>'required| min:10',
            'blog-description'=>'required| min:50',
        ]);

        $blog= new Blog();
        $blog->title= $request->input('title');
        $blog->description= $request->input('blog-description');
        $blog->user_id= auth()->user()->id;
        if($blog->save()){
            return redirect()->back()->with('message','Cheers!! New Blog Added Successfully');
        }else{
            return redirect()->back()->with('message','Something went wrong !! Please try again');
        }
    }

    public function show($id){
        $blog= Blog::findOrFail($id);
        return view('blogCrud.show',[
            'blog'=>$blog
        ]);
    }

    public function update($id){
        $blog= Blog::findOrFail($id);
        return view('blogCrud.update',[
            'blog'=>$blog
        ]);
    }

    public function storeUpdated(Request $request){
        $blog= Blog::findOrFail($request->id);
        $request->validate([
            'title'=>'required| min:10',
            'blog-description'=>'required| min:50',
        ]);
        $blog->title= $request->input('title');
        $blog->description= $request->input('blog-description');
        if($blog->update()){
            return redirect()->back()->with('message','Cheers!! Blog Updated Successfully');
        }else{
            return redirect()->back()->with('message','Failed to update');
        }
    }

    public function removeBlog($id){
        $blog= Blog::findOrFail($id);
        if($blog){
            Blog::destroy($id);
            return back()->with('removal_message','Blog removed successfully');
        }else{
            return back()->with('removal_message','Please try again');
        }
    }
}
