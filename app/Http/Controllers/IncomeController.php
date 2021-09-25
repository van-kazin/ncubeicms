<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Incomegroup;
use App\Models\Membership;
use Auth;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('financials.income.index')->with('incomes', Income::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('financials.income.create')->with('incomegroups', Incomegroup::all())
                                            ->with('incomes', Income::all())
                                            ->with('memberships', Membership::all());


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
          'incomegroup_id' =>'required',
          'membership_id' =>'required',
          'date' =>'required',
          'payment_mode' => 'required',
          'amount' =>'required',
          'currency' =>'required',
          'rate' =>'required'
      ]);

      Income::create([
          'incomegroup_id' => $request->incomegroup,
          'membership_id' => $request->paid_by,
          'date' => $request->date,
          'user_id' => $request->Auth::user()->id,
          'description' => $request->description,
          'input_amount' => $request->input_amount,
          'payment_mode' => $request->payment_mode,
          'currency' => $request->currency,
          'rate' => $request->rate,
          'bank_name' => $request->bank_name,
          'cheque_no' => $request->cheque_no,
          'cheque_date' => $request->cheque_date,
          'amount' => $request->amount
      ]);

      return redirect(route('incomes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function show(Income $income)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function edit(Income $income)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Income $income)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function destroy(Income $income)
    {
        //
    }
}
