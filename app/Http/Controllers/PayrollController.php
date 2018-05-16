<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance;
use App\Employee;
use App\Outcome;

class PayrollController extends Controller
{
    //
    public function index()
    {
        return view('finance.payroll.indexPayroll');
    }

    public function create(Request $request)
    {
        $date1 = $request->input('date1');
        $date2 = $request->input('date2');
        $idArray = array();
        $attendances = Attendance::whereBetween('atd_date',[$date1,$date2])->get();

        foreach($attendances as $attendance)
        {
          $idArray[] = $attendance->atd_ids;

        }

        
    }
}
