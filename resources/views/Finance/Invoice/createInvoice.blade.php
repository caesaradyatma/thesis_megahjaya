@extends('layouts.app')

@include('includes.navbar')

@section('content')
  <div class="container-fluid">
    <h1>Bon Pembelian</h1>
    <hr>
    <small>List barang yang dipesan</small>
    <table class="table table-striped">
      <tr>
        <th>Nama Barang</th>
        <th>Jumlah Pesanan</th>
        <th>Harga Satuan</th>
        <th></th>
      </tr>
      @if(Session::has('cart'))
        @foreach($products as $product)
          <tr>
            <td>{{$product['item']['item_name']}}</td>
            <td>{{$product['item_quantity']}}</td>
            <td>{{number_format($product['item']['item_price'])}}</td>
            <td>{{number_format($product['item_quantity']*$product['item']['item_price'])}}</td>
          </tr>
        @endforeach
      @else
      @endif
      <tr>
        <th colspan="3">Total Price</th>
        <td>{{number_format($totPrice)}}</td>
        <td></td>
      </tr>
    </table>
    <small>Data Pelanggan</small>
    {!! Form::open(['action' => 'InvoicesController@store','method' => 'POST']) !!}
      <div class="form-group">
        {{Form::label('cst_name', 'Nama Pelanggan')}}
        {{Form::text('cst_name','',['class'=>'form-control','placeholder'=>'Nama Pelanggan'])}}
      </div>
      <div class="form-group">
        {{Form::label('cst_company', 'Nama Perusahaan')}}
        {{Form::text('cst_company','',['class'=>'form-control','placeholder'=>'Nama Pelanggan'])}}
      </div>
      <div class="form-group">
        {{Form::label('inv_date', 'Tanggal Transaksi')}}
        {{Form::date('inv_date','',['class'=>'form-control'])}}
      </div>
      <div class="form-group">
        {{Form::label('inv_totPrice', 'Total Harga')}}
        {{Form::number('inv_totPrice',$totPrice,['class'=>'form-control','placeholder'=>'Nama Pelanggan'])}}
      </div>
      <div class="form-group">
        {{Form::label('inv_type', 'Jenis Transaksi')}}
        {{Form::select('inv_type',[1=>'Lunas',2=>'Diantar',3=>'Utang'],'',['class'=>'form-control'])}}
      </div>
      {{Form::hidden('_method','POST')}}
      {{Form::submit('Submit',['class'=>'btn btn-primary form-control'])}}
    {!! Form::close() !!}
  </div>
@endsection
