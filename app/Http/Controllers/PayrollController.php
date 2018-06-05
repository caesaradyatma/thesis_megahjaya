<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance;
use App\Employee;
use App\Outcome;
use App\Payroll;

class PayrollController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('finance.payroll.indexPayroll');
    }

    public function create(Request $request)
    {
        $date1 = $request->input('date1');
        $date2 = $request->input('date2');
        $idArray = array();
        $emp_ids = array();
        $attendances = Attendance::whereBetween('atd_date',[$date1,$date2])->get();
        $employees = Employee::where('emp_deletedAt',NULL)->get();
        $basePayroll = Payroll::where('payroll_name','Gaji Pokok')->orderBy('created_at', 'desc')->first();
        $womenPayroll = Payroll::where('payroll_name','Bonus Pegawai Wanita')->orderBy('created_at', 'desc')->first();
        $jabatanPayroll = Payroll::where('payroll_name','emp_type')->orderBy('created_at', 'desc')->first();
        $eduPayroll = Payroll::where('payroll_name','emp_education')->orderBy('created_at', 'desc')->first();

        foreach($employees as $employee)
        {
          $emp_ids[] = $employee->id;
        }
        foreach($attendances as $attendance)
        {
          $idArray[] = $attendance->atd_ids;

        }

        $freqs = array_count_values($idArray);
        $salaryArray = array();
        $totalPayroll = 0;
        foreach($employees as $employee){
          if($employee->emp_gender ==1){

            if(isset($freqs[$employee->id])){
                $salaryArray[$employee->id] = $freqs[$employee->id] * $basePayroll->payroll_amount;
            }
            else{
                $salaryArray[$employee->id] = 0;
            }

          }
          else{
            if(isset($freqs[$employee->id])){
                $salaryArray[$employee->id] = ($freqs[$employee->id] * $basePayroll->payroll_amount)+$womenPayroll->payroll_amount;
            }
            else{
                $salaryArray[$employee->id] = 0;
            }

          }
          $totalPayroll = $totalPayroll + $salaryArray[$employee->id];
        }
        // dd($freqs);


        return view('Finance.Payroll.createPayroll')
          ->with('freqs',$freqs)
          ->with('employees',$employees)
          ->with('salaryArray',$salaryArray)
          ->with('date1',$date1)
          ->with('date2',$date2)
          ->with('totalPayroll',$totalPayroll);
    }

    public function setPayrollView()
    {
      $basePayroll = Payroll::where('payroll_name','Gaji Pokok')->orderBy('created_at', 'desc')->first();
      $womenPayroll = Payroll::where('payroll_name','Bonus Pegawai Wanita')->orderBy('created_at', 'desc')->first();
      $jabatanPayroll = Payroll::where('payroll_name','emp_type')->orderBy('created_at', 'desc')->first();
      $eduPayroll = Payroll::where('payroll_name','emp_education')->orderBy('created_at', 'desc')->first();

      return view('Finance.Payroll.setPayroll')->with('basePayroll',$basePayroll)->with('womenPayroll',$womenPayroll)->with('jabatanPayroll',$jabatanPayroll)->with('eduPayroll',$eduPayroll);
    }

    public function setPayroll(Request $request)
    {
      $date = date('Y-m-d');
      $salary_base = $request->input('salary_base');
      $base = "Gaji Pokok";
      $womenBonus = "Bonus Pegawai Wanita";
      $salary_women = $request->input('salary_women');

      $bonus_name = $request->input('bonus_name');
      $bonus_condition = $request->input('bonus_condition');
      $bonus_amount = $request->input('bonus_amount');
      $size = sizeof($bonus_name);
      $x = 0;

      //Base Salary
      $payroll = Payroll::where('payroll_name','Gaji Pokok')->orderBy('updated_at', 'desc')->first();;
      $payroll->payroll_name = $base;
      $payroll->payroll_amount = $salary_base;
      $payroll->up_date = $date;
      $payroll->save();

      //Women Bonus
      $payroll = Payroll::where('payroll_name','Bonus Pegawai Wanita')->orderBy('updated_at', 'desc')->first();;
      $payroll->payroll_name = $womenBonus;
      $payroll->payroll_amount = $salary_women;
      $payroll->up_date = $date;
      $payroll->save();

      if($bonus_condition[0] == NULL){

      }
      else{
        for($x=0;$x<$size;$x++){
          $payroll = new Payroll;
          $payroll->payroll_name = $bonus_name[$x];
          $payroll->payroll_condition = $bonus_condition[$x];
          $payroll->payroll_amount = $bonus_amount[$x];
          $payroll->up_date = $date;
          $payroll->save();

        }
      }
      return redirect('payroll/')->with('success','Nominal Gaji Berhasil di Update');
    }
}
