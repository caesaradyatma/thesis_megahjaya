<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Income;
use App\Outcome;
use App\Utang;
use App\Piutang;

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
        $incomes = Income::where('in_deletedAt',NULL)->orderBy('created_at','desc')->paginate(10);//ini buat pagination
        $outcomes = Outcome::where('out_deletedAt',NULL)->orderBy('created_at','desc')->paginate(10);//ini buat pagination
        // $utangs = Utang::where('utg_deletedAt',NULL)->orderBy('created_at','desc')->paginate(10);//ini buat pagination
        // $piutangs = Piutang::where('piut_deletedAt',NULL)->orderBy('created_at','desc')->paginate(10);//ini buat pagination
        $totIncomes = 0;
        $totOutcomes = 0;
        // $totUtangs = 0;
        // $totPiutangs = 0;
        $balance = 0;
        foreach ($incomes as $income) {
          $totIncomes = $totIncomes + $income->in_amount;
        };
        foreach($outcomes as $outcome){
          $totOutcomes = $totOutcomes + $outcome->out_amount;
        }
        // foreach($utangs as $utang){
        //   $totUtangs = $totUtangs + $utang->utg_amount;
        // }
        // foreach($piutangs as $piutang){
        //   $totPiutangs = $totPiutangs + $piutang->piut_amount;
        // }

        $balance = $totIncomes - $totOutcomes;

        return view('home')
        ->with('totIncomes', $totIncomes)
        ->with('totOutcomes',$totOutcomes)
        ->with('balance',$balance);
        // ->with('totUtang',$totUtangs)
        // ->with('totPiutang',$totPiutangs);
    }
}
