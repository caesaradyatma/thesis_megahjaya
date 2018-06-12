<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomersController extends Controller
{
    //
    public function index()
    {
      $customers = Customer::where('deleted_at',NULL)->orderBy('id','asc')->paginate(10);
      return view('hr.indexCustomer')->with('customers',$customers);
    }

    public function create()
    {
      return view('hr.createCustomer');
    }

    public function store(Request $request)
    {
      $this->validate($request,[
        'cst_name' => 'required',
        'cst_contact' => 'required',
        'cst_address' => 'required'
      ]);

      $customer = new Customer;
      $customer->cst_name = $request->input('cst_name');
      $customer->cst_contact = $request->input('cst_contact');
      $customer->cst_address = $request->input('cst_address');
      $customer->cst_company = $request->input('cst_company');
      $customer->user_id = auth()->user()->id;
      $customer->save();

      return redirect('/customers')->with('success','Data Pelanggan berhasil di input');
    }

    public function show($id)
    {
      $customer = Customer::find($id);

      if($customer != NULL){
        $delDate = $customer->deleted_at;
        if($delDate != NULL){
          return redirect('/customers')->with('error', 'Data Yang Ingin Anda Akses Sudah Dihapus');
        }
        else{
          return view('hr.showcustomer')->with('customer', $customer);
        }
      }
      else{
        return redirect('/customers')->with('error', 'Data Yang Ingin Anda Akses Tidak Ada');
      }
    }

    public function edit($id)
    {
        //
        $customer = customer::find($id);
        if($customer != NULL){//if data exist

          // $delStat = $income->in_deleteStat;
          // if($delStat == 1){
          //   return redirect('/incomes')->with('error', 'Data Yang Ingin Anda Akses Sudah Dihapus');
          // }

          //if data is deleted
          $delDate = $customer->empdeleted_at;
          if($delDate != NULL){
            return redirect('/customers')->with('error', 'Data Yang Ingin Anda Akses Sudah Dihapus');
          }//success
          else{
            return view('hr.editcustomer')->with('customer', $customer);
          }

        }
        else{//fail
          return redirect('/customers')->with('error', 'Data Yang Ingin Anda Akses Tidak Ada');
        }
    }

    public function update(Request $request)
    {
      $this->validate($request,[
        'cst_name' => 'required',
        'cst_contact' => 'required',
        'cst_address' => 'required'
      ]);

      $customer = Customer::find($id);
      $customer->cst_name = $request->input('cst_name');
      $customer->cst_contact = $request->input('cst_contact');
      $customer->cst_address = $request->input('cst_address');
      $customer->cst_company = $request->input('cst_company');
      $customer->user_id = auth()->user()->id;
      $customer->save();

      return redirect('/customers')->with('success','Data Pelanggan berhasil diupdate');
    }

    public function destroy($id)
    {
      $customer = Customer::find($id);
      $date = date('Y-m-d H:i:s');
      $customer->user_id = auth()->user()->id;
      $customer->deleted_at = $date;

      $customer->save();
      return redirect('/customers')->with('success', 'Data Pendapatan Telah Dihapus');
    }
}
