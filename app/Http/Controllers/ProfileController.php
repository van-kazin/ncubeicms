<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.profile')->with('user', Auth::user());
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
      $this->validate($request, [
          'name' => 'required',
          'email' => 'required|email',
          'about' => 'required'
      ]);

        $user = Auth::user();
        if($request->hasFile('avatar'))
        {
            $avatar = $request->avatar;
            $avatar_new_name = time(). $avatar->getClientOriginalName();
            $avatar->move('img/avatars', $avatar_new_name);
            $user->profile->avatar = 'img/avatars/' .  $avatar_new_name;
            $user->profile->save();
        }

        if ($request->password) {
           $user->password = $request->password;
        }
           $user->name = $request->name;
           $user->email = $request->email;
           $user->profile->about = $request->about;
           $user->profile->phone = $request->phone;
           $user->profile->dob = $request->dob;
           $user->save();
           $user->profile->save();
           // Session::flash('success', 'Profile Updated');
           return redirect(route('home'));
    }
}
