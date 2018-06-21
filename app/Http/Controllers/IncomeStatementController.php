<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Income;
use App\Outcome;
use App\Invoice;
use App\Utang;

class IncomeStatementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
         $this->middleware('auth');
     }
    public function index()
    {
        //
        return view('finance.Report.IndexIncomeStatement');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        // retrieve data from period
        // $period1 = $request->input('period1');
        // $period2 = $request->input('period2');
        $year = $request->input('year');
        $period1 = date("Y-m-d",strtotime($year."-01-01"));
        $period2 = date("Y-m-d",strtotime($year."-12-31"));
        // $period1 = date("Y-m-d",strtotime($request->input('period1')));
        // $period2 = date("Y-m-d",strtotime($request->input('period2')."+1 day"));
        $incomes = Income::where('in_deletedAt',NULL)->whereBetween('in_date',[$period1,$period2])->get();
        // $outperiod1 = $request->input('period1');
        // $outperiod2 = $request->input('period2');
        $outcomes = Outcome::where('out_deletedAt',NULL)->whereBetween('out_date',[$period1,$period2])->get();
        $open_inventory = 500000000;
        $close_inventory = 780000000;
        $totIncomes = 0;

        //total income
        // foreach($incomes as $income){
        //   $totIncomes = $totIncomes + $income->in_amount;
        // }
        //total expense
        // foreach($outcomes as $outcome){
        //   $totOutcomes = $totOutcomes +$outcome->out_amount;
        // }

        //retrieve incomes
        // $piutangs = Income::where('in_deletedAt',NULL)->where('in_type',1)->whereBetween('in_date',[$period1,$period2])->get();
        $sales = Invoice::where('deleted_at',NULL)->where('inv_type',1)->orWhere('inv_type',2)->whereBetween('inv_date',[$period1,$period2])->get();
        // $totPiutangs = 0;
        $totSales = 0;

        //retrieve expenses
        $utilities = Outcome::where('out_deletedAt',NULL)->where('out_type',3)->whereBetween('out_date',[$period1,$period2])->get();
        $gasolines = Outcome::where('out_deletedAt',NULL)->where('out_type',5)->whereBetween('out_date',[$period1,$period2])->get();
        $salaries = Outcome::where('out_deletedAt',NULL)->where('out_type',4)->whereBetween('out_date',[$period1,$period2])->get();
        $totUtilities = 0;
        // $utangs = Outcome::where('out_deletedAt',NULL)->where('out_type',1)->whereBetween('out_date',[$period1,$period2])->get();
        $totGasolines = 0;
        $totSalary = 0;
        // $totUtangs = 0;

        //retrieve purchases inventory
        $totPurchased = 0;
        $cash_stocks = Outcome::where('out_deletedAt',NULL)->where('out_type',11)->whereBetween('out_date',[$period1,$period2])->get();
        $utg_stocks = Utang::where('utg_deletedAt',NULL)->where('utg_type',8)->whereBetween('created_at',[$period1,$period2])->get();
        foreach($utg_stocks as $utg_stock){
          $totPurchased = $totPurchased + $utg_stock->utg_amount;
        }

        //count Sales
        foreach($sales as $sale){
          $totSales = $totSales + $sale->inv_totPrice;
        }

        //count incomes
        foreach($incomes as $income){
          $totIncomes = $totIncomes + $income->in_amount;
        }

        //count expenses
        foreach($utilities as $utility){
          $totUtilities = $totUtilities + $utility->out_amount;
        }
        foreach($gasolines as $gasoline){
          $totGasolines = $totGasolines + $gasoline->out_amount;
        }
        foreach($salaries as $salary){
          $totSalary = $totSalary + $salary->out_amount;
        }

        $totExpenses = $totUtilities + $totGasolines + $totSalary;

        return view('/finance.Report.showIncomeStatement')
        ->with('totIncomes',$totIncomes)
        ->with('totExpenses',$totExpenses)
        ->with('totSales',$totSales)
        ->with('totPurchased',$totPurchased)
        ->with('totUtilities',$totUtilities)
        ->with('totGasolines', $totGasolines)
        ->with('totSalary', $totSalary)
        ->with('year',$year)
        ->with('open_inventory',$open_inventory)
        ->with('close_inventory',$close_inventory);
        // return view('/finance.Report.showIncomeStatement')->with('incomes',$incomes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
