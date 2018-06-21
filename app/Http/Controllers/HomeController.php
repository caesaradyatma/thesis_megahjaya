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
      return view('home');
    }
    public function hr()
    {
      return view('hrDash');
    }
    public function finance()
    {
        $incomes = Income::where('in_deletedAt',NULL)->orderBy('created_at','desc')->get();
        $outcomes = Outcome::where('out_deletedAt',NULL)->orderBy('created_at','desc')->get();
        $invoices = Invoice::where('deleted_at',NULL)->where('inv_status',1)->orderBy('created_at','desc')->get();
        $utangs = Utang::where('utg_deletedAt',NULL)->where('utg_paiddate',NULL)->orderBy('created_at','desc')->get();
        $piutangs = Piutang::where('piut_deletedAt',NULL)->where('piut_paiddate',NULL)->orderBy('created_at','desc')->get();
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

        $piut_days = array();
        $piut_duedates = array();
        foreach($piutangs as $piutang){
          $due = $piutang->piut_duedate;
          $today = date('Y-m-d');
          $date2 = date_create($due);
          $date1 = date_create($today);
          // $days_left = date_diff($date1, $date2);
          $days_left = $date2->diff($date1);
          $int = $days_left->days;
          // $piut_days[] = $days_left->days;
          // echo $piutang->piut_id." ";
          // echo $days_left->format("%R%a days ");
          if($int <= 7){
            $piut_days[] = $days_left->days;
            $piut_duedates[] = $piutang->piut_id;
            $size = sizeof($piut_duedates);

          }
          if(sizeof($piut_duedates) == 0){
            $size = -1;
          }

        }

        $utg_days = array();
        $utg_duedates = array();
        foreach($utangs as $utang){
          $due = $utang->utg_duedate;
          $today = date('Y-m-d');
          $date2 = date_create($due);
          $date1 = date_create($today);
          // $days_left = date_diff($date1, $date2);
          $days_left = $date2->diff($date1);
          $int = $days_left->days;
          // $piut_days[] = $days_left->days;
          // echo $piutang->piut_id." ";
          // echo $days_left->format("%R%a days ");
          if($int <= 7){
            $utg_days[] = $days_left->days;
            $utg_duedates[] = $utang->utg_id;
            $size_utg = sizeof($utg_duedates);
          }
          if(sizeOf($utg_duedates) == 0){
            $size_utg = -1;
          }

        }

        // dd($piut_days);
        return view('financeDash')
        ->with('totIncomes', $totIncomes)
        ->with('totOutcomes',$totOutcomes)
        ->with('totSales', $totSales)
        ->with('balance',$balance)
        ->with('totUtang',$totUtangs)
        ->with('totPiutang',$totPiutangs)
        ->with('utangs',$utangs)
        ->with('piutangs',$piutangs)
        ->with('piut_days',$piut_days)
        ->with('piut_duedates',$piut_duedates)
        ->with('size',$size)
        ->with('utg_days',$utg_days)
        ->with('utg_duedates',$utg_duedates)
        ->with('size_utg',$size_utg);
    }
}
