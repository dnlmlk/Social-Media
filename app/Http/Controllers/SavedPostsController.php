<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SavedPostsController extends Controller
{

    public function index()
    {
        $features = Feature::where(['user_id' => auth()->user()->id, 'is_saved' => '1'])->get()->sortByDesc('updated_at');
        $user = \App\Models\User::find(auth()->user()->id);
        $posts = [];

        foreach ($features as $feature) {
            $posts[] = $feature->post;
        }

        return view('archivedPosts', ['user' => $user, 'posts' => $posts]);
    }


    public function save(Request $request)
    {
        $response = Gate::inspect('save', auth()->user());
        $feature = Feature::where('post_id', $request->post_id)->where('user_id', auth()->user()->id)->first();

        if ($response->denied()) {
            session()->flash('save', $response->message());
            return response(['message' => 'error' ,'view' => (string) view('forAjax.saveError')]);
        }

        if ($response->allowed()) {

            if (is_null($feature)) {
                $feature = Feature::create([
                    'user_id' => auth()->user()->id,
                    'post_id' => $request->post_id,
                    'is_saved' => "1"
                ]);
            } elseif (!is_null($feature) && $feature->is_saved == '1') {
                $feature->is_saved = '0';
                $feature->save();

            } elseif (!is_null($feature) && $feature->is_saved == '0') {
                $feature->is_saved = '1';
                $feature->save();

            }

            return response(['message' => 'success', 'view' => (string) view('forAjax.like', ['feature' => $feature, 'postId' => $request->post_id])]);
        }
    }


    public function delete(Request $request)
    {
        $feature = Feature::where('post_id', $request->post_id)->where('user_id', auth()->user()->id)->first();

        $feature->is_saved = '0';
        $feature->save();

        return response(['message' => 'success']);
    }
}
