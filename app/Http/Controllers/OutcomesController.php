<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Outcome;
class OutcomesController extends Controller
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
      $outcomes = Outcome::where('out_deleteStat',0)->orderBy('created_at','desc')->paginate(10);//ini buat pagination
      return view('finance.indexOutcome')->with('outcomes', $outcomes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('finance.createOutcome');
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
        'out_type' => 'required',
        'out_name' => 'required',
        'out_amount' => 'required',
        'out_date' => 'required'
      ]);

      //Create Outcome
      $outcome = new Outcome;
      $outcome->out_type = $request->input('out_type');
      $outcome->out_name = $request->input('out_name');
      $outcome->out_amount = $request->input('out_amount');
      $outcome->out_date = $request->input('out_date');
      $outcome->user_id = auth()->user()->id;
      $outcome->out_desc = $request->input('out_desc');
      $outcome->out_deleteStat = 0;
      // $income->in_deletedAt = 0000-00-00 00:00:00;
      $outcome->save();

      // if($out_type == 1){
      //
      //   return view('finance.createUtang')
      //     ->with('out_name',$out_name)
      //     ->with('out_amount',$out_amount)
      //     ->with('out_desc',$out_desc);
      //
      //   return view('finance.createUtang')->with('out_id',$out_id);
      // }

      return redirect('/outcomes')->with('success', 'Data Pengeluaran Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($out_id)
    {
      $outcome = Outcome::find($out_id);
      return view('finance.showOutcome')->with('outcome', $outcome);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($out_id)
    {
        $outcome = Outcome::find($out_id);
        return view('finance.editOutcome')->with('outcome', $outcome);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $out_id)
    {
        $this->validate($request,[
          'out_type' => 'required',
          'out_name' => 'required',
          'out_amount' => 'required',
          'out_date' => 'required'
        ]);

        //Update Post
        $outcome = Outcome::find($out_id);
        $outcome->out_type = $request->input('out_type');
        $outcome->out_name = $request->input('out_name');
        $outcome->out_amount = $request->input('out_amount');
        $outcome->out_date = $request->input('out_date');
        $outcome->out_desc = $request->input('out_desc');
        $outcome->user_id = auth()->user()->id;
        // $income->user_id = 1;
        // $income->in_deleteStat = 0;
        $outcome->save();

        return redirect('/outcomes')->with('success', 'Data Pengeluaran Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($out_id)
    {
        $outcome = Outcome::find($out_id);
        //permanent deletion
        //$income->delete();
        //temp deletion
        $date = date('Y-m-d H:i:s');
        $outcome->user_id = auth()->user()->id;
        $outcome->out_deleteStat = 1;
        $outcome->out_deletedAt = $date;
        $outcome->save();
        return redirect('/outcomes')->with('success', 'Data Pengeluaran Telah Dihapus');
    }
}
