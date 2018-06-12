<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $date = date('Y-m-d');
        // $dayofweek = date('w', strtotime($date));
        // echo $date;
        // echo $dayofweek;

        $employees = Employee::where('emp_deletedAt',NULL)->orderBy('id','asc')->paginate(10);//ini buat pagination
        return view('hr.indexEmployee')->with('employees',$employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('hr.createEmployee');
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
          'emp_type' => 'required',
          'emp_name' => 'required',
          'emp_gender' => 'required',
          'emp_contact' => 'required'
        ]);

        $employee = new Employee;
        $employee->emp_name = $request->input('emp_name');
        $employee->emp_age = $request->input('emp_age');
        $employee->emp_type = $request->input('emp_type');
        $employee->emp_gender = $request->input('emp_gender');
        $employee->emp_contact = $request->input('emp_contact');
        $employee->emp_address = $request->input('emp_address');
        $employee->emp_education = $request->input('emp_education');
        $employee->user_id = auth()->user()->id;
        $employee->save();

        return redirect('/employees')->with('success', 'Data Pegawai Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $employee = Employee::find($id);

        if($employee != NULL){
          $delDate = $employee->emp_deletedAt;
          if($delDate != NULL){
            return redirect('/employees')->with('error', 'Data Yang Ingin Anda Akses Sudah Dihapus');
          }
          else{
            return view('hr.showEmployee')->with('employee', $employee);
          }
        }
        else{
          return redirect('/employees')->with('error', 'Data Yang Ingin Anda Akses Tidak Ada');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $employee = Employee::find($id);
        if($employee != NULL){//if data exist

          // $delStat = $income->in_deleteStat;
          // if($delStat == 1){
          //   return redirect('/incomes')->with('error', 'Data Yang Ingin Anda Akses Sudah Dihapus');
          // }

          //if data is deleted
          $delDate = $employee->emp_deletedAt;
          if($delDate != NULL){
            return redirect('/employees')->with('error', 'Data Yang Ingin Anda Akses Sudah Dihapus');
          }//success
          else{
            return view('hr.editEmployee')->with('employee', $employee);
          }

        }
        else{//fail
          return redirect('/employees')->with('error', 'Data Yang Ingin Anda Akses Tidak Ada');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
          'emp_type' => 'required',
          'emp_name' => 'required',
          'emp_gender' => 'required',
          'emp_contact' => 'required'
        ]);

        $employee = Employee::find($id);
        $employee->emp_name = $request->input('emp_name');
        $employee->emp_age = $request->input('emp_age');
        $employee->emp_type = $request->input('emp_type');
        $employee->emp_gender = $request->input('emp_gender');
        $employee->emp_contact = $request->input('emp_contact');
        $employee->emp_address = $request->input('emp_address');
        $employee->emp_education = $request->input('emp_education');
        $employee->user_id = auth()->user()->id;
        $employee->save();

        return redirect('/employees')->with('success', 'Data Pegawai Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $employee = Employee::find($id);
        $date = date('Y-m-d H:i:s');
        $employee->user_id = auth()->user()->id;
        $employee->emp_deletedAt = $date;

        $employee->save();
        return redirect('/employees')->with('success', 'Data Pegawai Telah Dihapus');
    }
}
