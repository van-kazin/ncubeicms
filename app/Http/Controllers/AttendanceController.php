<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Membership;
use Auth;
use Carbon;

use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('attendance.index')->with('memberships', Membership::all())->with('attendances', Attendance::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('attendance.create')->with('memberships', Membership::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
            'user_id'      => 'required',
            'date'         => 'required',
            'attendance'   => 'required'
        ]);

        foreach ($request->attendance as $membershipid => $attendance) {

            if( $attendance == 'present' ) {
                $attendance = true;
            } else if( $attendance == 'absent' ){
                $attendance = false;
            }

            Attendance::create([
                'user_id'    => $request->user_id,
                'membership_id' => $membershipid,
                'date'  => $request->date,
                'attendance' => $attendance
            ]);
        }

        return redirect(route('attendance'));

        // dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
