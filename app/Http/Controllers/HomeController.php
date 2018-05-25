<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Income;
use App\Outcome;
use App\Utang;
use App\Piutang;
use App\Invoice;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incomes = Income::where('in_deletedAt',NULL)->orderBy('created_at','desc')->get();
        $outcomes = Outcome::where('out_deletedAt',NULL)->orderBy('created_at','desc')->get();
        $invoices = Invoice::where('deleted_at',NULL)->where('inv_type',1)->orderBy('created_at','desc')->get();
        $utangs = Utang::where('utg_deletedAt',NULL)->orderBy('created_at','desc')->get();
        $piutangs = Piutang::where('piut_deletedAt',NULL)->orderBy('created_at','desc')->get();
        $totIncomes = 0;
        $totOutcomes = 0;
        $totUtangs = 0;
        $totPiutangs = 0;
        $totSales = 0;
        $balance = 0;
        foreach ($incomes as $income) {
          $totIncomes = $totIncomes + $income->in_amount;
        };
        foreach($outcomes as $outcome){
          $totOutcomes = $totOutcomes + $outcome->out_amount;
        }
        foreach($utangs as $utang){
          $totUtangs = $totUtangs + $utang->utg_amount;
        }
        foreach($piutangs as $piutang){
          $totPiutangs = $totPiutangs + $piutang->piut_amount;
        }
        foreach($invoices as $invoice){
          $totSales = $totSales + $invoice->inv_totPrice;
        }

        $balance = ($totIncomes + $totSales) - $totOutcomes;

        return view('home')
        ->with('totIncomes', $totIncomes)
        ->with('totOutcomes',$totOutcomes)
        ->with('totSales', $totSales)
        ->with('balance',$balance)
        ->with('totUtang',$totUtangs)
        ->with('totPiutang',$totPiutangs);
    }
}
