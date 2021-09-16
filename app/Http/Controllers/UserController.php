<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index')->with('users', User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create')->with('permissions', permission::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
          'name' => 'required',
          'role' => 'required',
          'email' => 'required|email|unique:users'
      ]);
      $user = User::create([
        'name' =>$request->name,
        'email' =>$request->email,
        'role' => $request->role,
        'password' => bcrypt('password')
     ]);
     $profile = Profile::create([
        'user_id' => $user->id,
        'avatar' => 'img/rev.jpeg',
        'dob' => '00-00-0000',
        'about' => 'About Here'
     ]);

       // save permission on Assignment
       if ($request->has('permissions')) {
        $user->syncPermissions($request->permissions);
       }

     // session()->flash('sucess', 'User Created!');
     return redirect(route('users'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.create')->with('user', $user)->with('permissions', permission::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
      $this->validate($request, [
         'name' =>'required',
         'role' =>'required',
         'email' => 'required|email|unique:users,email,' .$user->id,
         // 'password' => ['sometimes', 'confirmed', Password::min(6)],
     ]);

     $user-> update([
           'name' => $request->name,
           'email' => $request->email,
           'role' => $request->role,
           'password' => bcrypt($request->password)
       ]);

       if ($request->has('permissions')) {
        $user->syncPermissions($request->permissions);
       }

        // session()->flash('success', 'Member Data Updated');
        return redirect(route('users'));
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
      $user->revokePermissionTo($user->permissions);
      $user->delete();
      $user->profile->delete();
      // session()->flash('success', 'Department Deleted!');
      return redirect()->back();
    }
}
