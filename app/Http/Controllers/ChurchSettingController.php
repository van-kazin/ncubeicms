<?php

namespace App\Http\Controllers;

use App\Models\ChurchSetting;
use Illuminate\Http\Request;

class ChurchSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('churchSetting.index')->with('churchSettings', ChurchSetting::first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChurchSetting  $churchSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChurchSetting $churchSetting)
    {
      $this->validate(request(), [
         'church_name' => 'required',
         'assembly_name' => 'required',
         'church_box_no' => 'required',
         'church_location' => 'required',
         'church_phone' => 'required',
     ]);

     $settings = ChurchSetting::first();

       if(request()->hasFile('church_logo'))
       {
           $church_logo = $request->church_logo;
           $church_logo_new_name = time(). $church_logo->getClientOriginalName();
           $church_logo->move('img/churchLogo', $church_logo_new_name);
           $settings->church_logo = '/img/churchLogo/' . $church_logo_new_name;
           $settings->save();
      }
           $settings->church_name = request()->church_name;
           $settings->assembly_name = request()->assembly_name;
           $settings->church_box_no = request()->church_box_no;
           $settings->church_location = request()->church_location;
           $settings->church_phone = request()->church_phone;
           $settings->church_email = request()->church_email;
           $settings->church_website = request()->church_website;
           $settings->save();
           // session()->flash('success', 'Church Profile Updated');
           return redirect()->back();
    }
}
