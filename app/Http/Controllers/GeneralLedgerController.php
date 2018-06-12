<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Income;
use App\Outcome;
use App\Utang;
use App\Piutang;
use App\Invoice;
use App\ActCode;

class GeneralLedgerController extends Controller
{
    //
    public function filterDate(){
      return view('finance.Report.indexLedger');
    }

    public function create(Request $request){
      $month = $request->input('month');
      $incomes = Income::where('in_deletedAt',NULL)->whereMonth('in_date','=',$month)->orderBy('created_at','asc')->get();
      $outcomes = Outcome::where('out_deletedAt',NULL)->whereMonth('out_date','=',$month)->orderBy('created_at','asc')->get();
      $invoices = Invoice::where('deleted_at',NULL)->where('inv_status',1)->whereMonth('inv_date','=',$month)->orderBy('created_at','asc')->get();
      $utangs = Utang::where('utg_deletedAt',NULL)->whereMonth('created_at','=',$month)->orderBy('created_at','asc')->get();
      $piutangs = Piutang::where('piut_deletedAt',NULL)->whereMonth('created_at','=',$month)->orderBy('created_at','desc')->get();
      $acts = ActCode::all();
      $action = array();
      $flow = array();
      foreach($acts as $act){
        $action[] = $act->action;
        $flow[] = $act->flow;
      }

      return view('finance.Report.showLedger')
      ->with('incomes',$incomes)
      ->with('outcomes',$outcomes)
      ->with('action',$action)
      ->with('flow',$flow);
    }
}
