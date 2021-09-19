<?php

namespace App\Http\Controllers;

use App\Models\Association;
use App\Models\ChurchSetting;
use App\Models\Department;
use App\Models\Membership;
use Storage;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('memberships.index')->with('memberships', Membership::all())
                                        ->with('departments', Department::all())
                                        ->with('associations', Association::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('memberships.create')->with('departments', Department::all())
                                         ->with('associations', Association::all())
                                         ->with('churchSetting', ChurchSetting::first());
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
         'name' =>'required|string|min:3',
         'gender'=>'required',
         'birthdate' => 'required|date',
         'language' => 'required',
         'member_id' => 'required|unique:memberships',
         'hometown' => 'required',
         'marital_status' => 'required',
         'father_name' => 'required',
         'mother_name' => 'required',
         'educational_level' => 'required',
         'employment_status' => 'required',
         'profession' => 'required',
         'pastor' => 'required',
         'image' => 'required|image'
     ]);
           $image = $request->image;
           $image_new_name = time(). $image->getClientOriginalName();
           $image->move('img/memberImage', $image_new_name);
           $image = 'img/memberImage' .  $image_new_name;

           $membership = Membership::create([
            'name'=> $request->name,
            'image'=> 'img/memberImage/' . $image_new_name,
            'birthdate'=> $request->birthdate,
            'member_id'=> $request->member_id,
            'gender'=> $request->gender,
            'language'=> $request->language,
            'school' =>$request->school,
            'pastor' =>$request->pastor,
            'houseaddress'=> $request->houseaddress,
            'hometown'=> $request->hometown,
            'phone'=> $request->phone,
            'email'=> $request->email,
            'marital_status'=> $request->marital_status,
            'spouse_name'=> $request->spouse_name,
            'children'=> $request->children,
            'father_name'=> $request->father_name,
            'mother_name'=> $request->mother_name,
            'nextofkin'=> $request->nextofkin,
            'educational_level'=> $request->educational_level,
            'employment_status'=> $request->employment_status,
            'profession'=> $request->profession,
            'placeofwork'=> $request->placeofwork,
            'date_enteredchurch'=> $request->date_enteredchurch,
            'baptism_date'=> $request->baptism_date,
            'former_church'=> $request->former_church
        ]);

        if ($request->association)
         {
             $membership->associations()->attach($request->association);
         }

       if ($request->department)
         {
            $membership->departments()->attach($request->department);
         }

       // session()->flash('success', 'Member Registered!');
       return redirect(route('members'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function show(Membership $membership)
    {
      return view('memberships.show')->with('membership', $membership)
                                       ->with('departments', Department::all())
                                       ->with('associations', Association::all())
                                       ->with('churchSetting', ChurchSetting::first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function edit(Membership $membership)
    {
        return view('memberships.create')->with('membership', $membership)
                                         ->with('departments', Department::all())
                                         ->with('associations', Association::all())
                                         ->with('churchSetting', ChurchSetting::first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Membership $membership)
    {
      $this->validate($request, [
          'name' =>'required',
          'gender'=>'required',
          'birthdate' => 'required',
          'hometown' => 'required',
          'marital_status' => 'required',
          'father_name' => 'required',
          'mother_name' => 'required',
          'educational_level' => 'required',
          'employment_status' => 'required',
          'profession' => 'required',
          'pastor' => 'required',
      ]);

      if($request->hasFile('image'))
       {
           Storage::delete($membership->image);
           $image = $request->image;
           $image_new_name = time(). $image->getClientOriginalName();
           $image->move('img/memberImage', $image_new_name);
           $membership->image = 'img/memberImage/'.$image_new_name;
       }

       $membership->update([
           'name' => $request->name,
           'birthdate' => $request->birthdate,
           'member_id' => $request->member_id,
           'gender' => $request->gender,
           'language' => $request->language,
           'houseaddress' => $request->houseaddress,
           'hometown' => $request->hometown,
           'school' => $request->school,
           'pastor' => $request->pastor,
           'phone' => $request->phone,
           'email' => $request->email,
           'marital_status' => $request->marital_status,
           'spouse_name' => $request->spouse_name,
           'children' => $request->children,
           'father_name' => $request->father_name,
           'mother_name' => $request->mother_name,
           'nextofkin' => $request->nextofkin,
           'educational_level' => $request->educational_level,
           'employment_status' => $request->employment_status,
           'profession'=> $request->profession,
           'placeofwork' => $request->placeofwork,
           'date_enteredchurch' => $request->date_enteredchurch,
           'baptism_date' => $request->baptism_date,
           'former_church' => $request->former_church,
       ]);


        if ($request->department) {
            $membership->departments()->sync($request->department);
        }
        if ($request->association) {
            $membership->associations()->sync($request->association);
        }
        // session()->flash('success', 'Member Data Updated');
        return redirect(route('members'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
      $membership = Membership::withTrashed()->where('id',$id)->firstOrFail();
     if ($membership->trashed()) {
         // if($membership->financials->count() > 0)
         // {
         //     session()->flash('error', 'Member Cannot be Deleted, Has financial records');
         //     return redirect(route('memberships.index'));
         // }
         // if($membership->financials->count < 0)
         // {
         //      Storage::delete($membership->image);
         //      $membership->forceDelete();
         //      // session()->flash('success', 'Member Deleted Successfully');
         //      return redirect(route('memberships.index'));
         // }
     }
     else
     {
         Storage::delete($membership->image);
         $membership->delete();
         // session()->flash('success', 'Member Deactivated!');

         return redirect(route('members'));
     }
    }

    public function trashed()
   {
       $trashed = Membership::onlyTrashed()->get();
       return view('memberships.inactive')->with('memberships', $trashed);
   }

   public function restore($id)
   {
       $membership = Membership::withTrashed()->where('id', $id)->firstOrFail();
       $membership->restore();
       session()->flash('success', 'Inactive Member Activated!');
       return redirect()->back();
   }

   public function department(Department $department)
   {
       return view('memberships.department')->with('department', $department)
                                            ->with('memberships', $department->memberships()->searched()->paginate(10));

   }

   public function association(Association $association)
   {
       return view('memberships.association')->with('association', $association)
                                             ->with('memberships', $association->memberships()->searched()->paginate(10));

   }
}
