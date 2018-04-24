<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\AttendanceList;

class AttendanceListController extends Controller
{
    //
    public function index(){
      $date = date('Y-m-d');
      $attendance = AttendanceList::where('atd_date',$date)->get();
      if($attendance == NULL){
        $attendant = $attendance->atd_ids;
        return view('hr.editAttendance')->with('attendance',$attendance)->with('attendant',$attendant);
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
