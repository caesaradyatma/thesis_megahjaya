<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Inventorylist;
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

     public function __construct()
     {
         $this->middleware('auth');
     }
    public function index()
    {
        //
        $invoices = Invoice::where('deleted_at',NULL)->paginate(10);
        // $cst_id = array();
        // foreach($invoices as $invoice)
        // {
        //   $cst_id[] = $product->
        //
        // }

        $cst_names = DB::table('invoices')
          ->leftJoin('customers','invoices.cst_id','=','customers.id')
          ->select('invoices.*','customers.cst_name')
          ->get();
        return view('finance.Invoice.indexInvoice')->with('invoices',$invoices)->with('cst_names',$cst_names);

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


    public function cartForm()
    {
      $products = Inventorylist::all();
      $idArray = array();
      foreach($products as $product)
      {
        $idArray[] = $product->id;
      }
      return view('finance.invoice.pickProduct')->with('products',$products)->with('idArray',$idArray);
    }

    public function createCart(Request $request)
    {
        $products = Inventorylist::all();

        $id = $request->input('id');
        $order_qty = $request->input('order_quantity');

        if($order_qty <=0 ){
          return redirect('invoices/create')->with('error','Tolong masukkan jumlah barang yang di inginkan');
        }

        $product = Inventorylist::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id,$order_qty);

        $request->session()->put('cart', $cart);
        // dd($request->session()->get('cart'));

        return redirect('/invoices/create')->with('success','Barang sudah ditambahkan');
    }

    public function getCart()
    {
        if(!Session::has('cart')){
          $products = Inventorylist::all();
          $idArray = array();
          foreach($products as $product)
          {
            $idArray[] = $product->id;
          }
          return redirect('/invoices/create')->with('products',$products)->with('idArray',$idArray)->with('error','Pilih barang yang dipesan terlebih dahulu');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $totPrice = $cart->totPrice;
        $products = $cart->items;
        return view('Finance.Invoice.createInvoice')->with('products',$products)->with('totPrice',$totPrice);
    }

    public function editCart(Request $request)
    {
      $item_name = $request->input('item_name');
      $order_qty = $request->input('order_quantity');

      $product = Inventorylist::where('item_name',$item_name)->first();
      // echo $product->item_name;
      $oldCart = Session::has('cart') ? Session::get('cart') : null;
      $cart = new Cart($oldCart);

      $cart->modify($product, $product->id,$order_qty);

      $totPrice = $cart->totPrice;
      $products = $cart->items;
      $request->session()->put('cart', $cart);
      // dd($request->session()->get('cart'));
      return redirect('/invoices/getCart')->with('success', 'Jumlah Pesanan Berhasil di Update')->with('products',$products)->with('totPrice',$totPrice);
    }

    public function destroyCart()
    {
      Session::forget('cart');
      return redirect('/invoices/create')->with('success','Pesanan berhasil dihapus');
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
        $company = Customer::where('cst_company',$cst_company)->first();
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        if($customer != NULL||$company !=NULL){
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
          $invoice->inv_products = json_encode($cart);
          $invoice->save();
          Session::forget('cart');

          $invoices = Invoice::where('deleted_at',NULL)->paginate(10);
          return redirect('index')->with('success','Invoice berhasil dibuat');
          // $cst_names = DB::table('invoices')
          //   ->leftJoin('customers','invoices.cst_id','=','customers.id')
          //   ->select('invoices.*','customers.cst_name')
          //   ->get();
          // return view('finance.Invoice.indexInvoice')->with('invoices',$invoices)->with('cst_names',$cst_names);
        }
        else{
          $newCust = new Customer;
          $newCust->cst_name = $request->input('cst_name');
          $newCust->cst_company = $request->input('cst_company');
          $newCust->cst_contact = $request->input('cst_contact');
          $newCust->save();
          $date = date('Y-m-d');
          $newCstName = $request->input('cst_name');
          $recentCust = Customer::where('cst_name',$newCstName)->first();
          $custID = $recentCust->id;

          $invoice = new Invoice;
          $invoice->inv_date = $request->input('inv_date');
          $invoice->inv_totPrice = $request->input('inv_totPrice');
          $invoice->inv_type = $request->input('inv_type');
          $inv_type = $request->input('inv_type');
          $invoice->cst_id = $custID;
          if($inv_type == 0){
            $invoice->inv_status=0;
          }
          else{
            $invoice->inv_status=1;
          }

          $invoice->inv_products = json_encode($cart);
          $invoice->save();
          Session::forget('cart');

          $invoices = Invoice::where('deleted_at',NULL)->paginate(10);
          return redirect('index')->with('success','Invoice berhasil dibuat');
          // $cst_names = DB::table('invoices')
          //   ->leftJoin('customers','invoices.cst_id','=','customers.id')
          //   ->select('invoices.*','customers.cst_name')
          //   ->get();
          // return view('finance.Invoice.indexInvoice')->with('invoices',$invoices)->with('cst_names',$cst_names);
        }
    }

    public function searchProduct(Request $request)
    {
      $search_product = $request->input('search_product');
      $products = Inventorylist::where('item_name',$search_product)->orWhere('item_name','like','%'.$search_product.'%')->get();
      // foreach($products as $product){
      //   echo $product->;
      // }
      $idArray = array();
      foreach($products as $product)
      {
        $idArray[] = $product->id;
      }

      return view('finance.invoice.searchResult')->with('products',$products)->with('idArray',$idArray);
    }

    public function searchInvoice(Request $request)
    {
      $inv_id = $request->input('inv_id');
      $cst_name = $request->input('cst_name');
      $cst_company = $request->input('cst_company');
      $inv_day = $request->input('inv_day');
      $inv_month = $request->input('inv_month');
      $inv_year = $request->input('inv_year');

      if($inv_id == NULL && $cst_name == NULL && $cst_company == NULL && $inv_day == NULL && $inv_month == NULL && $inv_year == NULL){
        return redirect('invoices')->with('error','Form pencarian kosong');
      }

      if($inv_day != NULL && $inv_month != NULL && $inv_year != NULL){
        //semua isi
        $oldformat = strtotime($inv_year.'-'.$inv_month.'-'.$inv_day);
        $date = date('Y-m-d',$oldformat);

        if($inv_id != NULL){//if id ada isinya
          $invoices = Invoice::where('inv_id',$inv_id)
            ->where('inv_date',$date)
            ->get();
          if($invoices->isEmpty()){//if rsult not found
            return redirect('/invoices')->with('error','Data Invoice tidak ada');
          }
          else{
            $joins = DB::table('invoices')
              ->leftJoin('customers','invoices.cst_id','=','customers.id')
              ->where('inv_id',$inv_id)
              ->select('invoices.*','customers.cst_name')
              ->get();

            return view('finance.invoice.indexInvoice')->with('cst_names',$joins);
          }
        }

        if($cst_name!=NULL)//if cst name ada isinya
        {
          $customers = Customer::where('cst_name',$cst_name)
            ->orWhere('cst_name','like','%'.$cst_name.'%')
            ->get();

          if($customers->isEmpty()){//if result not found
            return redirect('/invoices')->with('error','Data Invoice tidak ada');
          }

          foreach($customers as $customer){//if customer found
            $cst_id[] = $customer->id;
          }
          $invoices = Invoice::whereIn('cst_id',$cst_id)//get invoices
            ->where('inv_date',$date)
            ->get();

          if($invoices->isEmpty()){//if result not found
            return redirect('/invoices')->with('error','Data Invoice tidak ada');
          }
          else{
            $joins = DB::table('invoices')
              ->leftJoin('customers','invoices.cst_id','=','customers.id')
              ->whereIn('cst_id',$cst_id)
              ->select('invoices.*','customers.cst_name')
              ->get();

            return view('finance.invoice.indexInvoice')->with('cst_names',$joins);
          }
        }

        if($cst_company!=NULL)//if cst company ada isinya
        {
          $customers = Customer::where('cst_company',$cst_company)
            ->orWhere('cst_company','like','%'.$cst_company.'%')
            ->get();

          if($customers->isEmpty()){//if result not found
            echo "ga ada asu";
            return redirect('/invoices')->with('error','Data Invoice tidak ada');
          }

          foreach($customers as $customer){//if customer found
            $cst_id[] = $customer->id;
          }
          $invoices = Invoice::whereIn('cst_id',$cst_id)//get invoices
            ->where('inv_date',$date)
            ->get();

          if($invoices->isEmpty()){//if result not found
            return redirect('/invoices')->with('error','Data Invoice tidak ada');
          }
          else{
            $joins = DB::table('invoices')
              ->leftJoin('customers','invoices.cst_id','=','customers.id')
              ->whereIn('cst_id',$cst_id)
              ->select('invoices.*','customers.cst_name')
              ->get();

            return view('finance.invoice.indexInvoice')->with('cst_names',$joins);
          }
        }


      }
      else if($inv_day == NULL && $inv_month != NULL && $inv_year != NULL){
        //tahun sama bulan isi
        $oldformat1 = strtotime($inv_year.'-'.$inv_month.'-1');
        $oldformat2 = strtotime($inv_year.'-'.$inv_month.'-31');
        $date1 = date('Y-m-d',$oldformat1);
        $date2 = date('Y-m-d',$oldformat2);

        if($inv_id!=NULL){//if id ada isinya
          $invoices = Invoice::where('inv_id',$inv_id)
            ->get();
          if($invoices->isEmpty()){//if rsult not found
            return redirect('/invoices')->with('error','Data Invoice tidak ada');
          }
          else{
            $joins = DB::table('invoices')
              ->leftJoin('customers','invoices.cst_id','=','customers.id')
              ->where('inv_id',$inv_id)
              ->select('invoices.*','customers.cst_name')
              ->get();

            return view('finance.invoice.indexInvoice')->with('cst_names',$joins);
          }
        }

        if($cst_name!=NULL)//if cst name ada isinya
        {
          $customers = Customer::where('cst_name',$cst_name)
            ->orWhere('cst_name','like','%'.$cst_name.'%')
            ->get();

          if($customers->isEmpty()){//if result not found
            return redirect('/invoices')->with('error','Data Invoice tidak ada');
          }

          foreach($customers as $customer){//if customer found
            $cst_id[] = $customer->id;
          }
          $invoices = Invoice::whereIn('cst_id',$cst_id)//get invoices
            ->whereBetween('inv_date',[$date1,$date2])
            ->get();

          if($invoices->isEmpty()){//if result not found
            return redirect('/invoices')->with('error','Data Invoice tidak ada');
          }
          else{
            $joins = DB::table('invoices')
              ->leftJoin('customers','invoices.cst_id','=','customers.id')
              ->whereIn('cst_id',$cst_id)
              ->select('invoices.*','customers.cst_name')
              ->get();

            return view('finance.invoice.indexInvoice')->with('cst_names',$joins);
          }
        }

        if($cst_company!=NULL)//if cst company ada isinya
        {
          $customers = Customer::where('cst_company',$cst_company)
            ->orWhere('cst_company','like','%'.$cst_company.'%')
            ->get();

          if($customers->isEmpty()){//if result not found
            return redirect('/invoices')->with('error','Data Invoice tidak ada');
          }

          foreach($customers as $customer){//if customer found
            $cst_id[] = $customer->id;
          }
          $invoices = Invoice::whereIn('cst_id',$cst_id)//get invoices
            ->whereBetween('inv_date',[$date1,$date2])
            ->get();

          if($invoices->isEmpty()){//if result not found
            return redirect('/invoices')->with('error','Data Invoice tidak ada');
          }
          else{
            $joins = DB::table('invoices')
              ->leftJoin('customers','invoices.cst_id','=','customers.id')
              ->whereIn('cst_id',$cst_id)
              ->select('invoices.*','customers.cst_name')
              ->get();

            return view('finance.invoice.indexInvoice')->with('cst_names',$joins);
          }
        }
      }//end tahun sama bulan isi
      else if($inv_day == NULL && $inv_month == NULL && $inv_year != NULL){
        //tahun isi
        $oldformat1 = strtotime($inv_year.'-01-1');
        $oldformat2 = strtotime($inv_year.'-12-31');
        $date1 = date('Y-m-d',$oldformat1);
        $date2 = date('Y-m-d',$oldformat2);

        if($inv_id!=NULL){//if id ada isinya
          $invoices = Invoice::where('inv_id',$inv_id)
            ->get();
          if($invoices->isEmpty()){//if rsult not found
            return redirect('/invoices')->with('error','Data Invoice tidak ada');
          }
          else{
            $joins = DB::table('invoices')
              ->leftJoin('customers','invoices.cst_id','=','customers.id')
              ->where('inv_id',$inv_id)
              ->select('invoices.*','customers.cst_name')
              ->get();

            return view('finance.invoice.indexInvoice')->with('cst_names',$joins);
          }
        }

        if($cst_name!=NULL)//if cst name ada isinya
        {
          $customers = Customer::where('cst_name',$cst_name)
            ->orWhere('cst_name','like','%'.$cst_name.'%')
            ->get();

          if($customers->isEmpty()){//if result not found
            echo "ga ada asu";
            return redirect('/invoices')->with('error','Data Invoice tidak ada');
          }

          foreach($customers as $customer){//if customer found
            $cst_id[] = $customer->id;
          }
          $invoices = Invoice::whereIn('cst_id',$cst_id)//get invoices
            ->whereBetween('inv_date',[$date1,$date2])
            ->get();


          if($invoices->isEmpty()){//if result not found
            return redirect('/invoices')->with('error','Data Invoice tidak ada');
          }
          else{
            $joins = DB::table('invoices')
              ->leftJoin('customers','invoices.cst_id','=','customers.id')
              ->whereIn('cst_id',$cst_id)
              ->select('invoices.*','customers.cst_name')
              ->get();

            return view('finance.invoice.indexInvoice')->with('cst_names',$joins);
          }
        }

        if($cst_company!=NULL)//if cst company ada isinya
        {
          $customers = Customer::where('cst_company',$cst_company)
            ->orWhere('cst_company','like','%'.$cst_company.'%')
            ->get();

          if($customers->isEmpty()){//if result not found
            return redirect('/invoices')->with('error','Data Invoice tidak ada');
          }

          foreach($customers as $customer){//if customer found
            $cst_id[] = $customer->id;
          }
          $invoices = Invoice::whereIn('cst_id',$cst_id)//get invoices
            ->whereBetween('inv_date',[$date1,$date2])
            ->get();

          if($invoices->isEmpty()){//if result not found
            return redirect('/invoices')->with('error','Data Invoice tidak ada');
          }
          else{
            $joins = DB::table('invoices')
              ->leftJoin('customers','invoices.cst_id','=','customers.id')
              ->whereIn('cst_id',$cst_id)
              ->select('invoices.*','customers.cst_name')
              ->get();

            return view('finance.invoice.indexInvoice')->with('cst_names',$joins);
          }

        }
      }//end tahun isi
      else if($inv_day == NULL && $inv_month != NULL && $inv_year == NULL){
        //bulan isi
        $oldformat1 = strtotime('1998-'.$inv_month.'-1');
        $oldformat2 = strtotime('2030-'.$inv_month.'-31');
        $date1 = date('Y-m-d',$oldformat1);
        $date2 = date('Y-m-d',$oldformat2);

        if($inv_id!=NULL){//if id ada isinya
          $invoices = Invoice::where('inv_id',$inv_id)
            ->get();
          if($invoices->isEmpty()){//if rsult not found
            return redirect('/invoices')->with('error','Data Invoice tidak ada');
          }
          else{
            $joins = DB::table('invoices')
              ->leftJoin('customers','invoices.cst_id','=','customers.id')
              ->where('inv_id',$inv_id)
              ->select('invoices.*','customers.cst_name')
              ->get();

            return view('finance.invoice.indexInvoice')->with('cst_names',$joins);
          }
        }

        if($cst_name!=NULL)//if cst name ada isinya
        {
          $customers = Customer::where('cst_name',$cst_name)
            ->orWhere('cst_name','like','%'.$cst_name.'%')
            ->get();

          if($customers->isEmpty()){//if result not found
            return redirect('/invoices')->with('error','Data Invoice tidak ada');
          }

          foreach($customers as $customer){//if customer found
            $cst_id[] = $customer->id;
          }
          $invoices = Invoice::whereIn('cst_id',$cst_id)//get invoices
            ->whereBetween('inv_date',[$date1,$date2])
            ->get();


          if($invoices->isEmpty()){//if result not found
            return redirect('/invoices')->with('error','Data Invoice tidak ada');
          }
          else{
            $joins = DB::table('invoices')
              ->leftJoin('customers','invoices.cst_id','=','customers.id')
              ->whereIn('cst_id',$cst_id)
              ->select('invoices.*','customers.cst_name')
              ->get();

            return view('finance.invoice.indexInvoice')->with('cst_names',$joins);
          }
        }

        if($cst_company!=NULL)//if cst company ada isinya
        {
          $customers = Customer::where('cst_company',$cst_company)
            ->orWhere('cst_company','like','%'.$cst_company.'%')
            ->get();

          if($customers->isEmpty()){//if result not found
            return redirect('/invoices')->with('error','Data Invoice tidak ada');
          }

          foreach($customers as $customer){//if customer found
            $cst_id[] = $customer->id;
          }
          $invoices = Invoice::whereIn('cst_id',$cst_id)//get invoices
            ->whereBetween('inv_date',[$date1,$date2])
            ->get();

          if($invoices->isEmpty()){//if result not found
            return redirect('/invoices')->with('error','Data Invoice tidak ada');
          }
          else{
            $joins = DB::table('invoices')
              ->leftJoin('customers','invoices.cst_id','=','customers.id')
              ->whereIn('cst_id',$cst_id)
              ->select('invoices.*','customers.cst_name')
              ->get();

            return view('finance.invoice.indexInvoice')->with('cst_names',$joins);
          }

        }
      }//end bulan isi
      else if($inv_day != NULL && $inv_month == NULL && $inv_year != NULL){
        //tahun sama hari isi
        $oldformat1 = strtotime($inv_year.'-'.'01'.'-'.$inv_day);
        $oldformat2 = strtotime($inv_year.'-'.'12'.'-'.$inv_day);
        $date1 = date('Y-m-d',$oldformat1);
        $date2 = date('Y-m-d',$oldformat2);

        if($inv_id!=NULL){//if id ada isinya
          $invoices = Invoice::where('inv_id',$inv_id)
            ->get();
          if($invoices->isEmpty()){//if rsult not found
            return redirect('/invoices')->with('error','Data Invoice tidak ada');
          }
          else{
            $joins = DB::table('invoices')
              ->leftJoin('customers','invoices.cst_id','=','customers.id')
              ->where('inv_id',$inv_id)
              ->select('invoices.*','customers.cst_name')
              ->get();

            return view('finance.invoice.indexInvoice')->with('cst_names',$joins);
          }
        }

        if($cst_name!=NULL)//if cst name ada isinya
        {
          $customers = Customer::where('cst_name',$cst_name)
            ->orWhere('cst_name','like','%'.$cst_name.'%')
            ->get();

          if($customers->isEmpty()){//if result not found

            return redirect('/invoices')->with('error','Data Invoice tidak ada');
          }

          foreach($customers as $customer){//if customer found
            $cst_id[] = $customer->id;
          }
          $invoices = Invoice::whereIn('cst_id',$cst_id)//get invoices
            ->whereBetween('inv_date',[$date1,$date2])
            ->get();


          if($invoices->isEmpty()){//if result not found
            return redirect('/invoices')->with('error','Data Invoice tidak ada');
          }
          else{
            $joins = DB::table('invoices')
              ->leftJoin('customers','invoices.cst_id','=','customers.id')
              ->whereIn('cst_id',$cst_id)
              ->select('invoices.*','customers.cst_name')
              ->get();

            return view('finance.invoice.indexInvoice')->with('cst_names',$joins);
          }
        }

        if($cst_company!=NULL)//if cst company ada isinya
        {
          $customers = Customer::where('cst_company',$cst_company)
            ->orWhere('cst_company','like','%'.$cst_company.'%')
            ->get();

          if($customers->isEmpty()){//if result not found
            return redirect('/invoices')->with('error','Data Invoice tidak ada');
          }

          foreach($customers as $customer){//if customer found
            $cst_id[] = $customer->id;
          }
          $invoices = Invoice::whereIn('cst_id',$cst_id)//get invoices
            ->whereBetween('inv_date',[$date1,$date2])
            ->get();

          if($invoices->isEmpty()){//if result not found
            return redirect('/invoices')->with('error','Data Invoice tidak ada');
          }
          else{
            $joins = DB::table('invoices')
              ->leftJoin('customers','invoices.cst_id','=','customers.id')
              ->whereIn('cst_id',$cst_id)
              ->select('invoices.*','customers.cst_name')
              ->get();

            return view('finance.invoice.indexInvoice')->with('cst_names',$joins);
          }

        }
      }//end tahun sm hari isi
      else if($inv_day == NULL && $inv_month == NULL && $inv_year == NULL){
        //kosong semua
        $oldformat1 = strtotime('1998-01-01');
        $oldformat2 = strtotime('2030-12-31');
        $date1 = date('Y-m-d',$oldformat1);
        $date2 = date('Y-m-d',$oldformat2);

        if($inv_id!=NULL){//if id ada isinya
          $invoices = Invoice::where('inv_id',$inv_id)
            ->get();
          if($invoices->isEmpty()){//if rsult not found
            return redirect('/invoices')->with('error','Data Invoice tidak ada');
          }
          else{
            $joins = DB::table('invoices')
              ->leftJoin('customers','invoices.cst_id','=','customers.id')
              ->where('inv_id',$inv_id)
              ->select('invoices.*','customers.cst_name')
              ->get();

            return view('finance.invoice.indexInvoice')->with('cst_names',$joins);
          }
        }

        if($cst_name!=NULL)//if cst name ada isinya
        {
          $customers = Customer::where('cst_name',$cst_name)
            ->orWhere('cst_name','like','%'.$cst_name.'%')
            ->get();

          if($customers->isEmpty()){//if result not found

            return redirect('/invoices')->with('error','Data Invoice tidak ada');
          }

          foreach($customers as $customer){//if customer found
            $cst_id[] = $customer->id;
          }
          $invoices = Invoice::whereIn('cst_id',$cst_id)//get invoices
            ->whereBetween('inv_date',[$date1,$date2])
            ->get();


          if($invoices->isEmpty()){//if result not found
            return redirect('/invoices')->with('error','Data Invoice tidak ada');
          }
          else{
            $joins = DB::table('invoices')
              ->leftJoin('customers','invoices.cst_id','=','customers.id')
              ->whereIn('cst_id',$cst_id)
              ->select('invoices.*','customers.cst_name')
              ->get();

            return view('finance.invoice.indexInvoice')->with('cst_names',$joins);
          }
        }

        if($cst_company!=NULL)//if cst company ada isinya
        {
          $customers = Customer::where('cst_company',$cst_company)
            ->orWhere('cst_company','like','%'.$cst_company.'%')
            ->get();

          if($customers->isEmpty()){//if result not found
            return redirect('/invoices')->with('error','Data Invoice tidak ada');
          }

          foreach($customers as $customer){//if customer found
            $cst_id[] = $customer->id;
          }
          $invoices = Invoice::whereIn('cst_id',$cst_id)//get invoices
            ->whereBetween('inv_date',[$date1,$date2])
            ->get();

          if($invoices->isEmpty()){//if result not found
            return redirect('/invoices')->with('error','Data Invoice tidak ada');
          }
          else{
            $joins = DB::table('invoices')
              ->leftJoin('customers','invoices.cst_id','=','customers.id')
              ->whereIn('cst_id',$cst_id)
              ->select('invoices.*','customers.cst_name')
              ->get();

            return view('finance.invoice.indexInvoice')->with('cst_names',$joins);
          }

        }

      }//end kosong semua


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
        $invoice = Invoice::find($id);
        $inv_id = $id;
        if($invoice != NULL){
          $purchased_item = $invoice->inv_products;
          $test = json_decode($purchased_item,true);
          // print_r($test);

          $products = $test['items'];
          $totPrice = $test['totPrice'];
          // foreach($products as $product){
          //   echo $product['item']['item_name'];
          //   echo $product['order_quantity'];
          // }
          return view('finance.invoice.showInvoice')->with('products',$products)->with('totPrice',$totPrice)->with('inv_id',$inv_id);
        }
        else{

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
