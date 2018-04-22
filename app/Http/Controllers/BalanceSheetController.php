<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BalanceSheetController extends Controller
{
    //
    public function index(){
      return view('finance.report.indexBalanceSheet');
    }

    public function create(Request $request){
      
    }
}
