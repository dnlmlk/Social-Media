<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AcceptUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Gate::inspect('view', auth()->user());

        if ($response->allowed()){
            $users = User::all()->where('id', '!=', auth()->user()->id)->sortByDesc('created_at');
            return view('acceptUsers', ['users' => $users]);
        }
        elseif ($response->denied()){
            return redirect()->route('root')->with(['status' => 'Your account isn\'t accepted yet']);
        }

    }


    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $request->{$id} == 'accept' ? $user->is_accepted = '1' : $user->is_accepted = '0';
        $user->save();

        return redirect()->route('accept-users.index');
    }


}
