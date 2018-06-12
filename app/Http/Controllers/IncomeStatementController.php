<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Income;
use App\Outcome;

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
    public function create()
    {
        //
        // retrieve data from period
        // $period1 = $request->input('period1');
        // $period2 = $request->input('period2');
        $period1 = date("Y-m-d",strtotime($request->input('period1')));
        $period2 = date("Y-m-d",strtotime($request->input('period2')."+1 day"));
        $incomes = Income::where('in_deletedAt',NULL)->whereBetween('in_date',[$period1,$period2])->get();
        // $outperiod1 = $request->input('period1');
        // $outperiod2 = $request->input('period2');
        $outcomes = Outcome::where('out_deletedAt',NULL)->whereBetween('out_date',[$period1,$period2])->get();

        $totIncomes = 0;
        $totExpenses = 0;
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
        $sales = Income::where('in_deletedAt',NULL)->where('in_type',2)->whereBetween('in_date',[$period1,$period2])->get();
        // $totPiutangs = 0;
        $totSales = 0;

        //retrieve expenses
        $costs = Outcome::where('out_deletedAt',NULL)->where('out_type',2)->whereBetween('out_date',[$period1,$period2])->get();
        // $utangs = Outcome::where('out_deletedAt',NULL)->where('out_type',1)->whereBetween('out_date',[$period1,$period2])->get();
        $totCosts = 0;
        // $totUtangs = 0;

        //count incomes
        // foreach($piutangs as $piutang){
        //   $totPiutangs = $totPiutangs + $piutang->in_amount;
        // }
        foreach($sales as $sale){
          $totSales = $totSales + $sale->in_amount;
        }
        $totIncomes = $totSales;

        //count expenses
        // foreach($utangs as $utang){
        //   $totUtangs = $totUtangs + $utang->out_amount;
        // }

        foreach($costs as $cost){
          $totCosts = $totCosts + $cost->out_amount;
        }
        $totExpenses = $totCosts;

        return view('/finance.Report.showIncomeStatement')
        ->with('totIncomes',$totIncomes)
        ->with('totExpenses',$totExpenses)
        ->with('totSales',$totSales)
        ->with('costs',$costs)
        ->with('totCosts',$totCosts);
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
