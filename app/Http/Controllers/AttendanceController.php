<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Attendance;
use App\Employee;
use App\AtdCart;
use Session;


class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index(){
      $date = date('Y-m-d');
      $attendances = Attendance::where('atd_date',$date)->get();
      if($attendances->isEmpty()){
        $employees = Employee::where('emp_deletedAt',NULL)->orderBy('id','asc')->paginate(10);//ini buat pagination
        return view('hr.indexAttendance')->with('employees',$employees)->with('date',$date);
      }
      else{
        $empIds = array();
        foreach($attendances as $attendance){
          $empIds[] = $attendance->atd_ids;
        }

        // dd($attendees);
        $employees = Employee::where('emp_deletedAt',NULL)->orderBy('id','asc')->paginate(10);//ini buat pagination
        return view('hr.editAttendance')->with('empIds',$empIds)->with('employees',$employees)->with('attendances',$attendances);

        // foreach($attendances as $attendance){
        //   $id = $attendance->id;
        //
        // }
        // $attendance = Attendance::find($id);
        // $array = json_decode($attendance->atd_ids,true);
        // $attendees = $array['employees'];
        // // dd($attendees);
        // $employees = Employee::where('emp_deletedAt',NULL)->orderBy('id','asc')->paginate(10);//ini buat pagination
        // return view('hr.editAttendance')->with('attendees',$attendees)->with('employees',$employees);
      }

    }

    public function createEmpCart(Request $request, $id)
    {
      $employee = Employee::find($id);
      $oldAtdCart = Session::has('atdCart') ? Session::get('atdCart') : null;
      $atdCart = new AtdCart($oldAtdCart);
      $atdCart->add($employee, $id);

      $request->session()->put('atdCart', $atdCart);
      dd($request->session()->get('atdCart'));
      return redirect('attendance')->with('success','Pegawai berhasil di absen');

    }

    public function getEmpCart()
    {
      if(!Session::has('atdCart')){
        $employees = Employee::all();
        $idArray = array();
        foreach($employees as $employee)
        {
          $idArray[] = $product->id;
        }
        return redirect('/invoices/create')->with('products',$products)->with('idArray',$idArray)->with('error','Pilih barang yang dipesan terlebih dahulu');
      }

      $oldAtdCart = Session::get('atdCart');
      $atdCart = new AtdCart($oldAtdCart);
      $employees = $atdCart->employees;
      return view('hr.editAttendance')->with('employees',$employees);
    }
    public function store(Request $request){

      $date = date('Y-m-d');

      $array = array();
      $idArray = array();
      $array = $request->input('emp_type');

      $employees = Employee::where('emp_deletedAt',NULL)->get();
      foreach($employees as $employee){
        $idArray[] = $employee->id;
      }

      for($x=0;$x<sizeof($array);$x++){

        if($array[$x] == 1){
          $attendance = new Attendance;
          $attendance->atd_date = $date;
          $attendance->atd_ids = $idArray[$x];
          $attendance->save();
        }


      }

      return redirect('attendance')->with('success','Data Absensi berhasil di submit');
      // $oldAtdCart = Session::get('atdCart');
      // $atdCart = new AtdCart($oldAtdCart);
      // $attendance->atd_date = $date;
      // $attendance->atd_ids = json_encode($atdCart);
      // $attendance->save();
      // Session::forget('atdCart');
    }

    public function update(Request $request)
    {
      $date = date('Y-m-d');

      $array = array();
      $idArray = array();
      $array = $request->input('emp_type');
      $idArray = $request->input('idArray');


      for($x=0;$x<sizeof($array);$x++){

        if($array[$x] == 1){
          $attendance = new Attendance;
          $attendance->atd_date = $date;
          $attendance->atd_ids = $idArray[$x];
          $attendance->save();
        }

      }
      return redirect('attendance')->with('success','Data Absensi berhasil di submit');
    }
}
