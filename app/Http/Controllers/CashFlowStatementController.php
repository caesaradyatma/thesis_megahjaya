<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Income;
use App\Outcome;

class CashFlowStatementController extends Controller
{
    //
    public function index(){
      return view('finance.report.indexCashFlowStatement');
    }

    public function show(Request $request){
      // $period = date("Y-m-d",strtotime($request->input('period')));
      $year = $request->input('year');
      $period1 = date("Y-m-d",strtotime("".$year.""."-01-01"));
      $period2 = date("Y-m-d",strtotime("".$year.""."-12-31"));

      $incomes = Income::where('in_deletedAt',NULL)->whereBetween('in_date',[$period1,$period2])->get();
      $outcomes = Outcome::where('out_deletedAt',NULL)->whereBetween('out_date',[$period1,$period2])->get();

      $sales = Income::where('in_deletedAt',NULL)->where('in_type',2)->whereBetween('in_date',[$period1,$period2])->get();
      $totSales = 0;

      $salaries = Outcome::where('in_deletedAt',NULL)->where('in_type',3)->whereBetween('out_date',[$period1,$period2])->get();
      $totSalaries = 0;

      //count incomes
      foreach($sales as $sale){
        $totSales = $totSales + $sale->in_amount;
      }

      //count expenses
      foreach($salaries as $salary){
        $totSalaries = $totSalaries + $salary->out_amount;
      }

      return view('finance.report.showCashFlowStatement');
    }

}
