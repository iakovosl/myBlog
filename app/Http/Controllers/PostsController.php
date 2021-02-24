<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

use Auth;

class PostsController extends Controller
{
    public function index (){
        $posts = Post::all();
        return view('posts',['posts'=>$posts]); 
    }

    public function userposts (){
        $user = Auth::user();
        $posts = Post::where("user_id", "=", $user->id)->get();
        return view('posts',['posts'=>$posts]); 
    }

    public function newpost(Request $request){
        if($request->method() == 'POST'){
            $post = new Post();
            $post->title = $request->get('title');
            $post->body = $request->get('body');
            $post->user_id = Auth::user()->id;
            $post->save();
            if ($post->save()){
                echo "Η ανάρτηση σας έχει καταχωρηθεί επιτυχώς!";
                return redirect('/posts');
            };
        };
        return view ('newpost');
    }

}
