<?php

namespace App\Http\Controllers;

use App\Models\Association;
use Illuminate\Http\Request;

class AssociationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          return view('associations.index')->with('associations', Association::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('associations.create');
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
          'name' =>'required|unique:associations'
      ]);

      Association::create([
          'name' => $request->name,
          'description' => $request->description
      ]);

      // session()->flash('success', 'Association Created!');
      return redirect(route('associations'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Association  $association
     * @return \Illuminate\Http\Response
     */
    public function edit(Association $association)
    {
        return view('associations.create')->with('association', $association);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Association  $association
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Association $association)
    {
      $this->validate($request, [
          'name' =>'required|unique:associations,name,' .$association->id
      ]);
      $association-> update([
          'name' => $request->name,
          'description' => $request->description
      ]);

      // session()->flash('success', 'Association Updated');
      return redirect(route('associations'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Association  $association
     * @return \Illuminate\Http\Response
     */
    public function destroy(Association $association)
    {
      if ($association->memberships->count() > 0)
      {
          // session()->flash('error', 'Department Cannot be Deleted! It has Members');
          return redirect()->back();
      }

      if ($association->memberships->count() < 1) {
          $association->delete();
          // session()->flash('success', 'Department Deleted!');
          return redirect()->back();

      }
    }
}
