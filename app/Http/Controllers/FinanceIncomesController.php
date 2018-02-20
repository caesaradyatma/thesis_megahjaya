<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FinanceIncome;

class FinanceIncomesController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //$posts = Post::all();//ini otomatis ngurut sesuai id
      //$posts = Post::orderBy('created_at','desc')->get();//ini ngurut sesuai tanggal created
      $incomes = FinanceIncome::where('in_deleteStat',0)->orderBy('created_at','desc')->paginate(10);//ini buat pagination
      return view('finance.indexIncome')->with('incomes', $incomes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('finance.createIncome');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,[
        'in_type' => 'required',
        'in_name' => 'required',
        'in_amount' => 'required',
        'in_date' => 'required'
      ]);

      //Create Post
      $income = new FinanceIncome;
      $income->in_type = $request->input('in_type');
      $income->in_name = $request->input('in_name');
      $income->in_amount = $request->input('in_amount');
      $income->in_date = $request->input('in_date');
      $income->user_id = auth()->user()->id;
      $income->in_desc = $request->input('in_desc');
      $income->in_deleteStat = 0;
      // $income->in_deletedAt = 0000-00-00 00:00:00;
      $income->save();

      return redirect('/incomes')->with('success', 'Data Pendapatan Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($in_id)
    {
      $income = FinanceIncome::find($in_id);
      return view('finance.showIncome')->with('income', $income);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($in_id)
    {
      $income = FinanceIncome::find($in_id);
      return view('finance.editIncome')->with('income', $income);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $in_id)
    {
      $this->validate($request,[
        'in_type' => 'required',
        'in_name' => 'required',
        'in_amount' => 'required',
        'in_date' => 'required'
      ]);

      //Update Post
      $income = FinanceIncome::find($in_id);
      $income->in_type = $request->input('in_type');
      $income->in_name = $request->input('in_name');
      $income->in_amount = $request->input('in_amount');
      $income->in_date = $request->input('in_date');
      $income->in_desc = $request->input('in_desc');
      $income->user_id = auth()->user()->id;
      // $income->user_id = 1;
      // $income->in_deleteStat = 0;
      $income->save();

      return redirect('/incomes')->with('success', 'Data Pendapatan Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($in_id)
    {
        $income = FinanceIncome::find($in_id);
        //permanent deletion
        //$income->delete();
        //temp deletion
        $date = date('Y-m-d H:i:s');
        $income->user_id = auth()->user()->id;
        $income->in_deleteStat = 1;
        $income->in_deletedAt = $date;
        $income->save();
        return redirect('/incomes')->with('success', 'Data Pendapatan Telah Dihapus');
    }
}
