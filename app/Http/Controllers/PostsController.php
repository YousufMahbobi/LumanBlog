<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;


class PostsController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    // Create New Post
    public function createPost(Request $request){
        $post = Post::create($request->all());
        return response()->json($post);
    }

    // Update Post
    public function updatePost(Request $request,$id){
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->views = $request->input('views');
        $post->save();
        return response()->json($post);
    }

    // Delete Post
    public function deletePost($id){
        $post = Post::find($id);
        $post->delete();
        return response()->json('Removed Successfully');
    }
    
    // Get All Posts
    public function index(){
        $post = Post::all();
        return response()->json($post);
    }

    // View Post
    public function viewPost($id){
        $post = Post::find($id);
        
        return response()->json($post);;
    }
}
?>