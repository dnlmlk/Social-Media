<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{



    public function add(Request $request)
    {
        Comment::create([
            'user_id' => auth()->user()->id,
            'post_id' => $request->post_id,
            'message' => $request->message
        ]);

        $post = Post::find($request->post_id);
         return view('forAjax.comment', ['post' => $post]);
    }
}
