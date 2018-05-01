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

      $sales = Income::where('in_type',2)->whereBetween('in_date',[$period1,$period2])->get();
      $totSales = 0;

      $piutangs = Income::where('in_type',1)->whereBetween('in_date',[$period1,$period2])->get();
      $totPiutangs = 0;

      $salaries = Outcome::where('out_deletedAt',NULL)->where('out_type',3)->whereBetween('out_date',[$period1,$period2])->get();
      $totSalaries = 0;

      //count incomes
      foreach($sales as $sale){
        $totSales = $totSales + $sale->in_amount;
      }

      //count expenses
      foreach($salaries as $salary){
        $totSalaries = $totSalaries + $salary->out_amount;
      }

      //count piutang
      foreach($piutangs as $piutang){
        $totPiutangs = $totPiutangs + $piutang->in_amount;
      }

      return view('finance.report.showCashFlowStatement')
        ->with('incomes',$incomes)
        ->with('outcomes',$outcomes)
        ->with('totSales',$totSales)
        ->with('totPiutangs', $totPiutangs)
        ->with('totSalaries',$totSalaries)
        ->with('period1',$period1)
        ->with('period2',$period2);
    }

}
