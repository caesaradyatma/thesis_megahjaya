<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Income;
use App\Piutang;
use Validator;

class ApiIncomesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $incomes = Income::where('in_deletedAt',NULL)->orderBy('created_at','desc')->paginate(10);//ini buat pagination
        return response()->json($incomes);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $income = Income::create($request->all());
        return response()->json($income, 201);

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
        $incomeShow = Income::find($in_id);
        return $incomeShow;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

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
        $income = Income::find($in_id);
        $income->in_type = $request->input('in_type');
        $income->in_name = $request->input('in_name');
        $income->in_amount = $request->input('in_amount');
        $income->in_date = $request->input('in_date');
        $income->in_desc = $request->input('in_desc');
        $income->user_id = $request->input('user_id');
        $piut_id = $request->input('piut_id');
        $income->save();
        return response()->json($income,200);
        // return $income;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Income $income)
    {
        //
        $income->delete();
        return response()->json(null, 204);
    }
}
