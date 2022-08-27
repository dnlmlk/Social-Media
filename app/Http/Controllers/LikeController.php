<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Request $request)
    {
        $feature = Feature::where('post_id', $request->post_id)->where('user_id', auth()->user()->id)->first();
        $post = Post::find($request->post_id);

        if (is_null($feature)){
            $feature = Feature::create([
                'user_id' => auth()->user()->id,
                'post_id' => $request->post_id,
                'is_liked' => "1"
            ]);


            $post->likes += 1;
            $post->save();
        }

        elseif (!is_null($feature) && $feature->is_liked == '1'){
            $feature->is_liked = '0';
            $feature->save();

            $post->likes -= 1;
            $post->save();
        }

        elseif (!is_null($feature) && $feature->is_liked == '0'){
            $feature->is_liked = '1';
            $feature->save();

            $post->likes += 1;
            $post->save();
        }

        return view('forAjax.like', ['feature' => $feature, 'postId' => $request->post_id]);
    }
}
