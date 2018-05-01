<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InventoryList;
use App\Invoice;
use App\Customer;
use App\Cart;

use Session;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $invoices = Invoice::where('deleted_at',NULL)->paginate(10);

        return view('finance.Invoice.indexInvoice')->with('invoices',$invoices);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $products = Inventorylist::all();
        return view('finance.Invoice.pickProduct')->with('products',$products);
    }

    public function getAddToCart(Request $request, $id)
    {
        $product = Inventorylist::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        // dd($request->session()->get('cart'));
        // return view('finance.Invoice.createInvoice');
        return redirect('/invoices/create')->with('success','Barang sudah ditambahkan');
    }

    public function getCart()
    {
        if(!Session::has('cart')){
          $products = Inventorylist::all();
          return view('finance.Invoice.pickProduct')->with('products',$products);
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $totPrice = $cart->totPrice;
        $products = $cart->items;
        return view('Finance.Invoice.createInvoice')->with('products',$products)->with('totPrice',$totPrice);
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
        $cst_name = $request->input('cst_name');
        $cst_company = $request->input('cst_company');
        $customer = Customer::where('cst_name',$cst_name)->first();
        $customer2 = Customer::where('cst_company',$cst_company)->first();
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        if($customer != NULL||$customer2 !=NULL){
          $cst_id = $customer->id;
          $invoice = new Invoice;
          $invoice->inv_date = $request->input('inv_date');
          $invoice->inv_totPrice = $request->input('inv_totPrice');
          $invoice->inv_type = $request->input('inv_type');
          $inv_type = $request->input('inv_type');
          if($inv_type == 0){
            $invoice->inv_status=0;
          }
          else{
            $invoice->inv_status=1;
          }
          $invoice->cst_id = $cst_id;
          $invoice->inv_products = serialize($cart);
          $invoice->save();
          Session::forget('cart');
        }
        else{
          $newCust = new Customer;
          $newCust->cst_name = $request->input('cst_name');
          $newCust->cst_company = $request->input('cst_company');
          $newCust->cst_contact = $request->input('cst_contact');
          $newCust->save();
          $date = date('Y-m-d');
          $recentCust = Customer::where('created_at',$date)->first();
          // $custID = $recentCust->id;

          $invoice = new Invoice;
          $invoice->inv_date = $request->input('inv_date');
          $invoice->inv_totPrice = $request->input('inv_totPrice');
          $invoice->inv_type = $request->input('inv_type');
          $inv_type = $request->input('inv_type');
          if($inv_type == 0){
            $invoice->inv_status=0;
          }
          else{
            $invoice->inv_status=1;
          }
          // $invoice->cst_id = $custID;
          $invoice->inv_products = serialize($cart);
          $invoice->save();
          Session::forget('cart');
        }
    }

    public function addMoreField(Request $request)
    {
        $rules = [];


        foreach($request->input('inv_products') as $key => $value) {
            $rules["inv_products.{$key}"] = 'required';
        }


        $validator = Validator::make($request->all(), $rules);


        if ($validator->passes()) {


            foreach($request->input('inv_products') as $key => $value) {
                Invoice::create(['inv_products'=>$value]);
            }


            return response()->json(['success'=>'done']);
        }


        return response()->json(['error'=>$validator->errors()->all()]);
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
    }
}
