<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Membership;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('departments.index')->with('departments', Department::all())
                                        ->with('memberships', Membership::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departments.create');
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
          'name' =>'required|unique:departments'
      ]);

      Department::create([
          'name' => $request->name,
          'description' => $request->description
      ]);

      // session()->flash('success', 'Department Created!');
      return redirect(route('departments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        return view('departments.create')->with('department', $department);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
      $this->validate($request, [
          'name' =>'required|unique:departments,name,' .$department->id
      ]);
      $department-> update([
          'name' => $request->name,
          'description' => $request->description
      ]);

      // session()->flash('success', 'Department Updated');
      return redirect(route('departments'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
      if ($department->memberships->count() > 0)
      {
          // session()->flash('error', 'Department Cannot be Deleted! It has Members');
          return redirect()->back();
      }

      if ($department->memberships->count() < 1) {
          $department->delete();
          // session()->flash('success', 'Department Deleted!');
          return redirect()->back();

      }
    }
}
