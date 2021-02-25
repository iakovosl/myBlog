<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

use Auth;

class CommentsController extends Controller
{
    public function new_comment(Post $post, Request $request){
        if($request->method() == 'POST'){
            $comment = new Comment();
            $comment->comment = $request->get('comment');
            $comment->user_id = Auth::user()->id;
            $comment->post_id = $post->id;
            $comment->save();
            if ($comment->save()){
                echo "Το σχόλιο σας έχει καταχωρηθεί επιτυχώς!";
                return redirect()->route("post",$post);
            };
        };
        return view('newcomment',['post' => $post]);
    }
}
