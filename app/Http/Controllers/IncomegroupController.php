<?php

namespace App\Http\Controllers;

use App\Models\Incomegroup;
use Illuminate\Http\Request;

class IncomegroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('financials.incomegroup.index')->with('incomegroups', Incomegroup::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('financials.incomegroup.create');
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
          'name' =>'required|unique:incomegroups'
      ]);

      Incomegroup::create([
          'name' => $request->name,
          'description' => $request->description
      ]);

      // session()->flash('success', 'Department Created!');
      return redirect(route('incomegroups'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Incomegroup  $incomegroup
     * @return \Illuminate\Http\Response
     */
    public function edit(Incomegroup $incomegroup)
    {
        return view('financials.incomegroup.create')->with('incomegroup', $incomegroup);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Incomegroup  $incomegroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Incomegroup $incomegroup)
    {
      $this->validate($request, [
          'name' =>'required|unique:incomegroups,name,' .$incomegroup->id
      ]);
      $incomegroup-> update([
          'name' => $request->name,
          'description' => $request->description
      ]);

      // session()->flash('success', 'Department Updated');
      return redirect(route('incomegroups'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Incomegroup  $incomegroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Incomegroup $incomegroup)
    {
        //TODO
    }
}
