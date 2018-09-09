<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;
use Purifier;
use Image;
use Storage;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //create a variable and store blog post from database
        $posts = Post::orderBy('id','desc')->paginate(2);

        //return a view and pass in the above variables

        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
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
        //        die;
       //dd($request);
           $post = new Post;
        $request->validate([
            'title'=> 'required|max:255',
            'body'=> 'required',
            'slug'=>'required|alpha_dash|max:255',
            'category_id'=>'required|integer',
            'image' => 'sometimes|image'
        ]);
          //store image in location public/immages
        if($request->hasFile('image')){
            $image = $request->file('image'); //can be encoded as encode();
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/'. $filename);
            Image::make($image)->resize(800,400)->save($location);
            $post->image = $filename;
        }

     

        $post->title = $request->title;

        $post->body = Purifier::clean($request->body);

        $post->slug = $request->slug;

        $post->category_id = $request->category_id;

        //$post

        $post->save();

        $post->tags()->sync($request->tags,false);

        //Session::flash('success','Post successfully saved');
        
        return redirect()->route('posts.show',$post->id);
    }
        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $post = Post::find($id);

         $categories = Category::all();
            
        $tags=Tag::all();
         
        /* $cats = array();
         foreach($categories as $category){
            $cats[$category->id]= $category->name;
         } 
         
         $tags2 = array();
         foreach($tags as $tag){
            $tags2[$tag->id]= $tag->name;
         }*/ 
           
         //  return view('posts.edit')->withPost($post)
           //     ->withCategories($cats)->withTags($tags2); 
         return view('posts.edit')->withPost($post)->withCategories($categories)->withTags($tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate 
         $post = Post::find($id);
         $categories = Category::all();
         $tags = Tag::all();

       if($request->input('title') == $post->slug ){
            $request->validate([
                'title'=> 'required|max:255',
                'body'=> 'required',
                'category_id'=>'required|integer'
                
                //'slug'=>'required|alpha_dash|max:255|unique:posts,slug'
            ]);
        }
        else{
            $request->validate([
                'title'=> 'required|max:255',
                'body'=> 'required',
                'slug'=>'required|alpha_dash|max:255',
                'category_id'=>'required|integer',
                'image' => 'image'
            ]);
        }
          //store
       
        $post->title = $request->input('title');
        
        $post->body = Purifier::clean($request->input('body'));
        
        $post->slug = $request->input('slug');
       
        $post->category_id = $request->input('category_id');


        if($request->hasfile('image')){
            //add new photo

            $image = $request->file('image'); //can be encoded as encode();
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/'. $filename);
            Image::make($image)->resize(800,400)->save($location);
            $oldFilename = $post->image;
             //update database
            $post->image = $filename;

            //deletw old photo
            Storage::delete($oldFilename);
        }

        $post->save();

        if(isset($request->tags)){
            $post->tags()->sync($request->tags);
        }
        else{
            $post->tags()->sync(array());
        }
        //redirect
        return redirect()->route('posts.show',$post->id);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $post = Post::find($id);
        $post->tags()->detach();
        Storage::delete($post->image);
        $post->delete();
        return redirect()->route('posts.index');
        

    }
}
