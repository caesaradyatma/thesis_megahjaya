<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Income;
use App\Outcome;
use App\Utang;
use App\Piutang;
use App\Invoice;
use App\ActCode;
use App\Ledger;

class GeneralLedgerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function filterDate(){
      return view('finance.Report.indexLedger');
    }

    public function create(Request $request){

      $month = $request->input('month');
      $year = $request->input('year');

      if($month == NULL){
        $date1 = date("Y-m-d",strtotime($year.'-01-01'));
        $date2 = date("Y-m-d",strtotime($year."-12-31"));
        $incomes = Income::where('in_deletedAt',NULL)->whereBetween('in_date',[$date1,$date2])->orderBy('in_date','asc')->get();
        $outcomes = Outcome::where('out_deletedAt',NULL)->whereBetween('out_date',[$date1,$date2])->orderBy('out_date','asc')->get();
        $invoices = Invoice::where('deleted_at',NULL)->whereBetween('inv_date',[$date1,$date2])->orderBy('inv_date','asc')->get();
        $utangs = Utang::where('utg_deletedAt',NULL)->whereBetween('created_at',[$date1,$date2])->orderBy('created_at','asc')->get();
        $piutangs = Piutang::where('piut_deletedAt',NULL)->whereBetween('created_at',[$date1,$date2])->orderBy('created_at','asc')->get();

      }
      else{
        $incomes = Income::where('in_deletedAt',NULL)->whereMonth('in_date','=',$month)->whereYear('in_date','=',$year)->orderBy('in_date','asc')->get();
        $outcomes = Outcome::where('out_deletedAt',NULL)->whereMonth('out_date','=',$month)->whereYear('out_date','=',$year)->orderBy('out_date','asc')->get();
        $invoices = Invoice::where('deleted_at',NULL)->whereMonth('inv_date','=',$month)->whereYear('inv_date','=',$year)->orderBy('inv_date','asc')->get();
        $utangs = Utang::where('utg_deletedAt',NULL)->whereMonth('created_at','=',$month)->whereYear('created_at','=',$year)->orderBy('created_at','asc')->get();
        $piutangs = Piutang::where('piut_deletedAt',NULL)->whereMonth('created_at','=',$month)->whereYear('created_at','=',$year)->orderBy('created_at','asc')->get();
      }

      $acts = ActCode::all();
      $action = array();
      $flow = array();

      //check if transaction data exist in ledger table

      foreach($incomes as $income){
          $exist = Ledger::where('act_code',$income->in_type)->where('trans_id',$income->in_id)->first();
          if($exist == NULL){
            $ledger = new Ledger;
            $ledger->date = $income->in_date;
            $ledger->desc = $income->in_name;
            $ledger->amount = $income->in_amount;
            $ledger->act_code = $income->in_type;
            $ledger->trans_id = $income->in_id;
            $ledger->save();
          }
          else{

          }
      }
      foreach($outcomes as $outcome){
          $exist = Ledger::where('act_code',$outcome->out_type)->where('trans_id',$outcome->out_id)->first();
          if($exist == NULL){
            $ledger = new Ledger;
            $ledger->date = $outcome->out_date;
            $ledger->desc = $outcome->out_name;
            $ledger->amount = $outcome->out_amount;
            $ledger->act_code = $outcome->out_type;
            $ledger->trans_id = $outcome->out_id;
            $ledger->save();
          }
          else{

          }
      }
      foreach($utangs as $utang){
          $exist = Ledger::where('act_code',$utang->utg_type)->where('trans_id',$utang->utg_id)->first();
          if($exist == NULL){
            $ledger = new Ledger;
            $ledger->date = $utang->created_at;
            $ledger->desc = $utang->utg_desc;
            $ledger->amount = $utang->utg_amount;
            $ledger->act_code = $utang->utg_type;
            $ledger->trans_id = $utang->utg_id;
            $ledger->save();
          }
          else{

          }
      }

      foreach($piutangs as $piutang){
          $exist = Ledger::where('act_code',$piutang->piut_type)->where('trans_id',$piutang->piut_id)->first();
          if($exist == NULL){
            $ledger = new Ledger;
            $ledger->date = $piutang->created_at;
            $ledger->desc = $piutang->piut_desc;
            $ledger->amount = $piutang->piut_amount;
            $ledger->act_code = $piutang->piut_type;
            $ledger->trans_id = $piutang->piut_id;
            $ledger->save();
          }
          else{

          }
      }

      foreach($invoices as $invoice){
          $exist = Ledger::where('trans_id',$invoice->inv_id)->first();
          if($exist == NULL){
            if($invoice->inv_type == 1 || $invoice->inv_type == 2){
              $ledger = new Ledger;
              $ledger->date = $invoice->created_at;
              $ledger->desc = "Penjualan, ID Bon ".$invoice->inv_id;
              $ledger->amount = $invoice->inv_totPrice;
              $ledger->act_code = 1;
              $ledger->trans_id = $invoice->inv_id;
              $ledger->save();
            }
            else{

            }
          }
          else{

          }
      }

      //retrieve from ledger table
      if($month == NULL){
          $ledgers = Ledger::whereBetween('date',[$date1,$date2])->where('deleted_at',NULL)->orderBy('date','asc')->get();
      }
      else{
          $ledgers = Ledger::whereMonth('date',$month)->whereYear('date',$year)->where('deleted_at',NULL)->orderBy('date','asc')->get();
      }


      $total = 0;
      foreach($ledgers as $ledger){
        $total = $total + $ledger->amount;
      }


      return view('finance.Report.showLedger')
      ->with('ledgers',$ledgers)
      ->with('total',$total)
      ->with('month',$month)
      ->with('year',$year);


    }
}
