<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{



    public function add(Request $request)
    {
        $response = Gate::inspect('comment', auth()->user());

        if ($response->denied()) {
            session()->flash('save', $response->message());
            return response(['message' => 'error' ,'view' => (string) view('forAjax.saveError')]);
        }

        if ($response->allowed()){
            Comment::create([
                'user_id' => auth()->user()->id,
                'post_id' => $request->post_id,
                'message' => $request->message
            ]);

            $post = Post::find($request->post_id);
            return view('forAjax.comment', ['post' => $post]);
        }
    }
}
