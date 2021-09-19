<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinancialController extends Controller
{
    public function index(){
      return view('financials.index');
    }
}
