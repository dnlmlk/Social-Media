<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EditProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(auth()->user()->id)->first();
        return view('editProfile', ['user' => $user]);
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
        $request->validate([
            'email' => 'unique:users',
            'password' => 'confirmed',
            'profileImage' => 'mimes:jpg,jpeg,png'
        ]);

        if ($request->file('profileImage')) {
            $fileName = 'profileImages/' . time() . '_' . $request->file('profileImage')->getClientOriginalName();
            $request->file('profileImage')->move(public_path('profileImages/'), $fileName);
        }

        $user = User::find($id)->first();

        is_null($request->name) ? null : $user->name = $request->name ;
        is_null($request->email) ? null : $user->email = $request->email;
        is_null($request->file('profileImage')) ? null : $user->image_path = $fileName;
        is_null($request->password) ? null : $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->route('profile.index')->with('status', 'Profile updated successfully!');

    }

}
