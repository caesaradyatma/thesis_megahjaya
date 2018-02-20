<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FinanceIncome;
use App\Outcome;

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
        $incomes = FinanceIncome::where('in_deleteStat',0)->orderBy('created_at','desc')->paginate(10);//ini buat pagination
        $outcomes = Outcome::where('out_deleteStat',0)->orderBy('created_at','desc')->paginate(10);//ini buat pagination
        $totIncomes = 0;
        $totOutcomes = 0;
        foreach ($incomes as $income) {
          $totIncomes = $totIncomes + $income->in_amount;
        };
        foreach($outcomes as $outcome){
          $totOutcomes = $totOutcomes + $outcome->out_amount;
        }

        return view('home')->with('totIncomes', $totIncomes)->with('totOutcomes',$totOutcomes);
    }
}
