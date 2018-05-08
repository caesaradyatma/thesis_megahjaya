@extends('layouts.app')

@include('includes.navbar')
<?php
  $x=0;
 ?>
@section('content')
  <div class="container-fluid">
    <h1>Pembuatan Invoice</h1>
    <small>Pilih barang yang dipesan pelanggan</small><br>
    <div class="row" style="margin-top:20px;">
      <div class="col-sm-6">
        <a href="/invoices/getCart" class="btn btn-primary">Form Pelanggan</a>
      </div>
      <div class="col-sm-6">
        {!! Form::open(['action' => 'InvoicesController@searchProduct', 'method' => 'POST']) !!}
          <table class="table">
            <tr>
              <td>{{Form::text('search_product','',['class'=>'form-control','placeholder'=>'Cari Barang'])}}</td>
              {{Form::hidden('_method','POST')}}
              <td>{{Form::submit('Submit',['class'=>'btn btn-primary form-control'])}}</td>
            </tr>
          </table>
        {!! Form::close() !!}
      </div>
    </div>
    <hr>
    <div class="row">
      @foreach ($products as $product)
        <div class="col-sm-4">
          <div class="panel panel-primary">
            {!! Form::open(['action' => 'InvoicesController@createCart', 'method' => 'POST']) !!}
              <div class="panel-heading">
                <h3>{{$product->item_name}}</h3>
              </div>
              <div class="panel-body">
                  <table class="table table-striped">
                    <tr>
                      <th>ID</th>
                      <td>{{$product->id}}</td>
                    </tr>
                    <tr>
                      <th>Jumlah Stok</th>
                      <td>{{number_format($product->item_quantity)}} {{$product->item_measurement}}</td>
                    </tr>
                    <tr>
                      <th>Harga Barang</th>
                      <td>{{number_format($product->item_price)}}</td>
                    </tr>
                    <tr>
                      <th>Jumlah Pesanan</th>
                      <td>{{Form::number('order_quantity','',['class'=>'form-control','placeholder'=>'Jumlah Pesanan'])}}</td>
                    </tr>
                    <tr>
                      <td colspan="2">{{Form::submit('Submit',['class'=>'btn btn-primary form-control'])}}</td>
                    </tr>
                    {{Form::hidden('id',$idArray[$x])}}
                    {{Form::hidden('_method','POST')}}
                  </table>
                  {{-- <h4>ID Barang = {{$product->id}}</h4>
                  <h4>Jumlah Stok = {{number_format($product->item_quantity)}} {{$product->item_measurement}}</h4>
                  {{number_format($product->item_price)}}
                  {{Form::number('order_quantity','',['class'=>'form-control','placeholder'=>'Jumlah Pesanan'])}}
                  {{Form::hidden('id',$idArray[$x])}}
                  {{Form::hidden('_method','POST')}}
                  {{Form::submit('Submit',['class'=>'btn btn-primary form-control'])}} --}}

              </div>
            {!! Form::close() !!}
          </div>
        </div>
        {{-- {!! Form::open(['action' => 'InvoicesController@createCart', 'method' => 'POST']) !!}
          {{$product->id}}
          {{$product->item_name}}
          {{number_format($product->item_quantity)}} {{$product->item_measurement}}
          {{number_format($product->item_price)}}
          {{Form::number('order_quantity','',['class'=>'form-control','placeholder'=>'Jumlah Pesanan'])}}
          {{Form::hidden('id',$idArray[$x])}}
          {{Form::hidden('_method','POST')}}
          {{Form::submit('Submit',['class'=>'btn btn-primary form-control'])}}
        {!! Form::close() !!} --}}
        <?php
          $x++;
         ?>
      @endforeach
    </div>
  </div>
@endsection
