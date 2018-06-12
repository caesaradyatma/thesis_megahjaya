<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Utang;
use App\Outcome;

class UtangsController extends Controller
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

        // $utangs = DB::table('utangs')
        //   ->join('outcomes','utangs.utg_id','=','outcomes.utg_id')
        //   ->select('utangs.*','outcomes.out_name','outcomes.out_amount')
        //   ->where('utg_deletedAt',NULL)
        //   ->paginate(10);

        $utangs = Utang::where('utg_deletedAt',NULL)->paginate(10);
        return view('finance.Utang.indexUtang')->with('utangs',$utangs);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('finance.Utang.createUtang');

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
        $this->validate($request,[
          'utg_type' => 'required',
          'utg_name' => 'required',
          'utg_amount' => 'required',
          'utg_duedate' => 'required',
          'utg_desc' => 'required'
        ]);
        //utang
        $utang = new Utang;
        $utang->user_id = auth()->user()->id;
        $utang->utg_type = $request->input('utg_type');
        $utang->utg_duedate = $request->input('utg_duedate');
        $utang->utg_name = $request->input('utg_name');
        $utang->utg_amount = $request->input('utg_amount');
        $utang->utg_desc = $request->input('utg_desc');
        $utang->save();

        //get utang id
        // $utang2 = Utang::orderBy('utg_id','desc')->first();
        // $lastUtg_id = $utang2->utg_id;

        //Create Outcome
        // $outcome = new Outcome;
        // $outcome->out_type = 1;
        // $outcome->out_name = $request->input('out_name');
        // $outcome->out_amount = $request->input('out_amount');
        // $outcome->out_date = $request->input('utg_duedate');
        // $outcome->user_id = auth()->user()->id;
        // $outcome->out_desc = $request->input('out_desc');
        // $outcome->out_deleteStat = 0;
        // $outcome->utg_id = $lastUtg_id;
        // $outcome->save();

        return redirect('/utangs')->with('success', 'Data Hutang Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($utg_id)
    {
        //
        $utang = Utang::find($utg_id);

        if($utang != NULL){
          // $outcome = DB::table('outcomes')->where('utg_id',$utg_id)->first();

          $delDate1 = $utang->utg_deletedAt;
          // $delDate2 = $outcome->out_deletedAt;
          if($delDate1 != NULL){
            return redirect('/utangs')->with('error', 'Data Yang Ingin Anda Akses Sudah Dihapus');
          }
          else{
            return view('finance.Utang.showUtang')->with('utang', $utang);
          }
        }
        else{
          return redirect('/utangs')->with('error', 'Data Yang Ingin Anda Akses Tidak Ada');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($utg_id)
    {
        //
        $utang = Utang::find($utg_id);

        if($utang != NULL){
          // $outcome = DB::table('outcomes')->where('utg_id',$utg_id)->first();

          $delDate1 = $utang->utg_deletedAt;
          // $delDate2 = $outcome->out_deletedAt;
          if($delDate1 != NULL){
            return redirect('/utangs')->with('error', 'Data Yang Ingin Anda Akses Sudah Dihapus');
          }
          else{
            return view('finance.Utang.editUtang')->with('utang', $utang);
          }
        }
        else{
    return redirect('/utangs')->with('error', 'Data Yang Ingin Anda Akses Tidak Ada');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $utg_id)
    {
        //
        $this->validate($request,[
          'utg_type' => 'required',
          'utg_name' => 'required',
          'utg_amount' => 'required',
          'utg_duedate' => 'required',

        ]);
        $utang = Utang::find($utg_id);
        $utang->utg_type = $request->input('utg_type');
        $utang->utg_duedate = $request->input('utg_duedate');
        $utang->utg_paidamount = $request->input('utg_paidamount');
        $utang->utg_paiddate = $request->input('utg_paiddate');
        $utang->utg_payer = $request->input('utg_payer');
        $utang->utg_status = $request->input('utg_status');
        $utang->utg_name = $request->input('utg_name');
        $utang->utg_amount = $request->input('utg_amount');
        $utang->utg_desc = $request->input('utg_desc');
        $utang->save();

        // $out_obj = DB::table('outcomes')->where('utg_id',$utg_id)->first();
        // $out_id = $out_obj->out_id;
        //
        // $outcome = Outcome::find($out_id);
        // $outcome->out_name = $request->input('out_name');
        // $outcome->out_amount = $request->input('out_amount');
        // $outcome->out_date = $request->input('utg_duedate');
        // $outcome->out_desc = $request->input('out_desc');
        // $outcome->user_id = auth()->user()->id;
        // $outcome->save();

        return redirect('/utangs')->with('success', 'Data Utang Berhasil Diupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($utg_id)
    {
        //delete from utang table
        $utang = Utang::find($utg_id);
        //permanent deletion
        //$income->delete();

        //temp deletion
        $date = date('Y-m-d H:i:s');
        $utang= Utang::find($utg_id);
        $utang->utg_deletedAt = $date;
        $utang->save();

        //get out_id
        // $outcome_obj = DB::table('outcomes')->where('utg_id',$utg_id)->first();
        // $out_id = $outcome_obj->out_id;

        //delete from outcome table
        // $outcome = Outcome::find($out_id);
        // $outcome->user_id = auth()->user()->id;
        // $outcome->out_deleteStat = 1;
        // $outcome->out_deletedAt = $date;
        // $outcome->save();
        return redirect('/utangs')->with('success', 'Data Utang Telah Dihapus');
    }
}
