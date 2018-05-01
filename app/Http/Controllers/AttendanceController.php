<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance;
use App\Employee;

class AttendanceController extends Controller
{
    //
    public function index(){
      $date = date('Y-m-d');
      $attendance = Attendance::where('created_at',$date)->first();
      if($attendance != NULL){
        return view('hr.editAttendance')->with('attendance',$attendance);
      }
      else{
        $employees = Employee::where('emp_deletedAt',NULL)->orderBy('id','asc')->paginate(10);//ini buat pagination
        return view('hr.indexAttendance')->with('employees',$employees)->with('date',$date);
      }

    }

    public function create(){
      return view('hr.indexEmployee');
    }
}
