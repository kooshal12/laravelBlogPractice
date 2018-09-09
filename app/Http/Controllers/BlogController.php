<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class BlogController extends Controller
{
    public function getSingle($slug)
    {
    	//fetch data 

    	$post = Post::where('slug' ,'=', $slug)->first(); 
    	//return $slug;
    	//return the view and posts in the post object
    	return view('blog.single')->withPost($post);

    }
}
