<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Income;
use App\Piutang;

// use App\Http\Resources\Income as IncomeResource;

class IncomesController extends Controller
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

        $incomes = Income::where('in_deletedAt',NULL)->orderBy('created_at','desc')->paginate(10);//ini buat pagination

        return view('finance.Income.indexIncome')->with('incomes', $incomes);

        //5.5
        // return IncomeResource::collection($incomes);

        //5.4
        // return response()->json($incomes);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('finance.Income.createIncome');
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
          'in_type' => 'required',
          'in_name' => 'required',
          'in_amount' => 'required',
          'in_date' => 'required'
        ]);

        //Create Post
        $income = new Income;
        $income->in_type = $request->input('in_type');
        $in_type = $request->input('in_type');
        $income->in_name = $request->input('in_name');
        $income->in_amount = $request->input('in_amount');
        $income->in_date = $request->input('in_date');
        $income->user_id = auth()->user()->id;
        $income->in_desc = $request->input('in_desc');

        // if($in_type == 1){
        //   $piutang = new Piutang;
        //   $piutang->piut_duedate = $request->input('in_date');
        //   $piutang->user_id = auth()->user()->id;
        //   $piutang->save();
        //
        //   $piutang2 = Piutang::orderBy('piut_id','desc')->first();
        //   $lastpiut_id = $piutang2->piut_id;
        //   $income->piut_id = $lastpiut_id;
        // }


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
        //
        $income = Income::find($in_id);

        if ($income != NULL){//if data exist

          // $delStat = $income->in_deleteStat;
          // if($delStat == 1){
          //   return redirect('/incomes')->with('error', 'Data Yang Ingin Anda Akses Sudah Dihapus');
          // }

          //validation
          $delDate = $income->in_deletedAt;
          if($delDate != NULL){//if data is deleted
            return redirect('/incomes')->with('error', 'Data Yang Ingin Anda Akses Sudah Dihapus');
          }
          //success
          else{
            return view('finance.Income.showIncome')->with('income', $income);
          }

        }
        else{//data do not exist
          return redirect('/incomes')->with('error', 'Data Yang Ingin Anda Akses Tidak Ada');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($in_id)
    {
        //
        $income = Income::find($in_id);
        if($income != NULL){//if data exist

          // $delStat = $income->in_deleteStat;
          // if($delStat == 1){
          //   return redirect('/incomes')->with('error', 'Data Yang Ingin Anda Akses Sudah Dihapus');
          // }

          //if data is deleted
          $delDate = $income->in_deletedAt;
          if($delDate != NULL){
            return redirect('/incomes')->with('error', 'Data Yang Ingin Anda Akses Sudah Dihapus');
          }//success
          else{
            return view('finance.Income.editIncome')->with('income', $income);
          }

        }
        else{//fail
          return redirect('/incomes')->with('error', 'Data Yang Ingin Anda Akses Tidak Ada');
        }
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
        //
        $this->validate($request,[
          'in_type' => 'required',
          'in_name' => 'required',
          'in_amount' => 'required',
          'in_date' => 'required'
        ]);

        //Update Post
        $income = Income::find($in_id);
        $income->in_type = $request->input('in_type');
        $income->in_name = $request->input('in_name');
        $income->in_amount = $request->input('in_amount');
        $income->in_date = $request->input('in_date');
        $income->in_desc = $request->input('in_desc');
        $income->user_id = auth()->user()->id;
        // $piut_id = $income->piut_id;
        //
        // if($income->in_type == 1){
        //   $piutang = Piutang::find($piut_id);
        //   $piutang->piut_duedate = $request->input('in_date');
        //   $piutang->user_id = auth()->user()->id;
        //   $piutang->save();
        // }
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
        //
        $income = Income::find($in_id);
        //permanent deletion
        //$income->delete();
        //temp deletion
        $date = date('Y-m-d H:i:s');
        $income->user_id = auth()->user()->id;
        // $income->in_deleteStat = 1;
        $income->in_deletedAt = $date;

        // $piut_id = $income->piut_id;
        // if($income->in_type == 1){
        //   $piutang = Piutang::find($piut_id);
        //   $income->in_deleteStat = 1;
        //   $income->in_deletedAt = $date;
        //   $piutang->user_id = auth()->user()->id;
        //   $piutang->save();
        // }
        $income->save();
        return redirect('/incomes')->with('success', 'Data Pendapatan Telah Dihapus');
    }
}
