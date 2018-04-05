<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Piutang;
use App\Income;


class PiutangsController extends Controller
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
        //
        $piutangs = DB::table('piutangs')
          ->join('incomes','piutangs.piut_id','=','incomes.piut_id')
          ->select('piutangs.*','incomes.in_name','incomes.in_amount','incomes.in_desc')
          ->where('piut_deletedAt',NULL)
          ->paginate(10);
        // $utangs = Utang::find();
        return view('finance.Piutang.indexPiutang')->with('piutangs',$piutangs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('finance.Piutang.createPiutang');
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
          'in_name' => 'required',
          'in_amount' => 'required',
          'piut_duedate' => 'required',
          'in_desc' => 'required'
        ]);
        //piutang
        $piutang = new Piutang;
        $piutang->user_id = auth()->user()->id;
        $piutang->piut_duedate = $request->input('piut_duedate');
        $piutang->save();

        //get latest piutang id
        $piutang2 = Piutang::orderBy('piut_id','desc')->first();
        $lastPiut_id = $piutang2->piut_id;

        //Create income
        $income = new Income;
        $income->in_type = 1;
        $income->in_name = $request->input('in_name');
        $income->in_amount = $request->input('in_amount');
        $income->in_date = $request->input('piut_duedate');
        $income->user_id = auth()->user()->id;
        $income->in_desc = $request->input('in_desc');
        //$income->in_deleteStat = 0;
        $income->piut_id = $lastPiut_id;
        $income->save();

        return redirect('/piutangs')->with('success', 'Data Piutang Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($piut_id)
    {
        //
        $piutang = Piutang::find($piut_id);
        if($piutang != NULL){//if data exist
          $income = DB::table('incomes')->where('piut_id',$piut_id)->first();
          // echo $outcome->out_name;
          // echo $utang->outcome->out_name;
          //validation
          // $delStat1 = $piutang->piut_deleteStat;
          // $delStat2 = $income->in_deleteStat;
          // if($delStat1 == 1 && $delStat2 == 1){
          //   return redirect('/piutangs')->with('error', 'Data Yang Ingin Anda Akses Sudah Dihapus');
          // }

          $delDate1 = $piutang->piut_deletedAt;
          $delDate2 = $income->in_deletedAt;
          if($delDate1 != NULL && $delDate2 != NULL){
            return redirect('/piutangs')->with('error', 'Data Yang Ingin Anda Akses Sudah Dihapus');
          }
          else{
            return view('finance.Piutang.showPiutang')->with('piutang', $piutang)->with('income',$income);
          }

        }
        else{
          return redirect('/piutangs')->with('error', 'Data Yang Ingin Anda Akses Tidak Ada');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($piut_id)
    {
        //
        $piutang = Piutang::find($piut_id);

        if($piutang != NULL){//if data exist
          $income = DB::table('incomes')->where('piut_id',$piut_id)->first();
          //Validation
          // $delStat1 = $piutang->piut_deleteStat;
          // $delStat2 = $income->in_deleteStat;
          // if($delStat1 == 1 && $delStat2 == 1){
          //   return redirect('/piutangs')->with('error', 'Data Yang Ingin Anda Akses Sudah Dihapus');
          // }

          $delDate1 = $piutang->piut_deletedAt;
          $delDate2 = $income->in_deletedAt;
          if($delDate1 != NULL && $delDate2 != NULL){//if data is deleted
            return redirect('/piutangs')->with('error', 'Data Yang Ingin Anda Akses Sudah Dihapus');
          }
          else{
            return view('finance.Piutang.editPiutang')->with('piutang',$piutang)->with('income',$income);
          }
        }
        else{
          return redirect('/piutangs')->with('error', 'Data Yang Ingin Anda Akses Tidak Ada');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $piut_id)
    {
        //
        $this->validate($request,[
          'in_name' => 'required',
          'in_amount' => 'required',
          'piut_duedate' => 'required',

        ]);
        $piutang = Piutang::find($piut_id);
        $piutang->piut_duedate = $request->input('piut_duedate');
        $piutang->piut_paidamount = $request->input('piut_paidamount');
        $piutang->piut_paiddate = $request->input('piut_paiddate');
        $piutang->piut_payer = $request->input('piut_payer');
        $piutang->piut_status = $request->input('piut_status');
        $piutang->save();

        $in_obj = DB::table('incomes')->where('piut_id',$piut_id)->first();
        $in_id = $in_obj->in_id;

        $income = Income::find($in_id);
        $income->in_name = $request->input('in_name');
        $income->in_amount = $request->input('in_amount');
        $income->in_date = $request->input('piut_duedate');
        $income->in_desc = $request->input('in_desc');
        $income->user_id = auth()->user()->id;
        $income->save();

        return redirect('/piutangs')->with('success', 'Data Piutang Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($piut_id)
    {
        //
        //delete from utang table
        $piutang = Piutang::find($piut_id);
        //permanent deletion
        //$income->delete();

        //temp deletion
        $date = date('Y-m-d H:i:s');
        $piutang= Piutang::find($piut_id);
        $piutang->piut_deleteStat = 1;
        $piutang->piut_deletedAt = $date;
        $piutang->save();

        //get out_id
        $income_obj = DB::table('incomes')->where('piut_id',$piut_id)->first();
        $in_id = $income_obj->in_id;

        //delete from outcome table
        $income = Income::find($in_id);
        $income->user_id = auth()->user()->id;
        $income->in_deleteStat = 1;
        $income->in_deletedAt = $date;
        $income->save();
        return redirect('/incomes')->with('success', 'Data Piutang Telah Dihapus');
    }
}
