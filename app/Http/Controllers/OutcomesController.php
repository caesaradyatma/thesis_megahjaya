<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Outcome;
use App\Utang;
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
      $outcomes = Outcome::where('out_deletedAt',NULL)->orderBy('created_at','desc')->paginate(10);//ini buat pagination

      return view('finance.Outcome.indexOutcome')->with('outcomes', $outcomes);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('finance.Outcome.createOutcome');
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
        'out_date' => 'required',
        'out_desc' => 'required'
      ]);

      //Create Outcome
      $outcome = new Outcome;
      $outcome->out_type = $request->input('out_type');
      $out_type = $request->input('out_type');
      $outcome->out_name = $request->input('out_name');
      $outcome->out_amount = $request->input('out_amount');
      $outcome->out_date = $request->input('out_date');
      $outcome->user_id = auth()->user()->id;
      $outcome->out_desc = $request->input('out_desc');
      $outcome->out_deleteStat = 0;
      // $income->in_deletedAt = 0000-00-00 00:00:00;

      if($out_type == 1){
        $utang = new Utang;
        $utang->utg_duedate = $request->input('out_date');
        $utang->user_id = auth()->user()->id;
        $utang->save();

        $utang2 = Utang::orderBy('utg_id','desc')->first();
        $lastUtg_id = $utang2->utg_id;
        $outcome->utg_id = $lastUtg_id;
      }


      $outcome->save();

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
      if($outcome != NULL){
        // $delStat = $outcome->out_deleteStat;
        //
        // if($delStat == 1){
        //   return redirect('/outcomes')->with('error', 'Data Yang Ingin Anda Akses Sudah Dihapus');
        // }

        $delDate = $outcome->out_deletedAt;
        if($delDate != NULL){
          return redirect('/outcomes')->with('error', 'Data Yang Ingin Anda Akses Sudah Dihapus');
        }
        else{
          return view('finance.Outcome.showOutcome')->with('outcome', $outcome);
        }
      }
      else{
        return redirect('/outcomes')->with('error', 'Data Yang Ingin Anda Akses Tidak Ada');
      }
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
        if($outcome != NULL){
          // $delStat = $outcome->out_deleteStat;
          // if($delStat == 1){
          //   return redirect('/oitcomes')->with('error', 'Data Yang Ingin Anda Akses Sudah Dihapus');
          // }

          $delDate = $outcome->out_deletedAt;
          if($delDate != NULL){
            return redirect('/outcomes')->with('error', 'Data Yang Ingin Anda Akses Sudah Dihapus');
          }
          else{
            return view('finance.Outcome.editOutcome')->with('outcome', $outcome);
          }
        }
        else{
          return redirect('/outcomes')->with('error', 'Data Yang Ingin Anda Akses Tidak Ada');
        }
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
        $out_type = $request->input('out_type');
        $outcome->out_name = $request->input('out_name');
        $outcome->out_amount = $request->input('out_amount');
        $outcome->out_date = $request->input('out_date');
        $outcome->out_desc = $request->input('out_desc');
        $outcome->user_id = auth()->user()->id;
        $utg_id = $outcome->utg_id;
        // $income->user_id = 1;
        // $income->in_deleteStat = 0;
        $outcome->save();

        if($out_type == 1){
          $utang = Utang::find($utg_id);
          $utang->utg_duedate = $request->input('out_date');
          $utang->user_id = auth()->user()->id;
          $utang->save();
        }


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
        if($outcome->out_type == 1){//if utang, delete from utang table also
          $utg_id=$outcome->utg_id;
          $utang= Utang::find($utg_id);
          $utang->utg_deleteStat = 1;
          $utang->utg_deletedAt = $date;
          $utang->save();
        }
        $outcome->user_id = auth()->user()->id;
        $outcome->out_deleteStat = 1;
        $outcome->out_deletedAt = $date;
        $outcome->save();
        return redirect('/outcomes')->with('success', 'Data Pengeluaran Telah Dihapus');
    }
}
