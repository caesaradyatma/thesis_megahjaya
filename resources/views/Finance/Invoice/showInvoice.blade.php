@extends('layouts.app')

@include('includes.navbar')

@section('content')
  <a href="/invoices" class="btn btn-default"style="margin-bottom:20px;">Kembali ke List Bon</a>
  <div class="panel panel-primary">
    <div class="panel-heading">
      Data Invoice
    </div>
    <div class="panel-body">
      <table class="table">
        <tr>
          <th>ID Invoice</th>
          <td>{{$inv_id}}</td>
        </tr>
        <tr>
          <th>Tanggal Invoice</th>
          <td>{{$invoice->inv_date}}</td>
        </tr>
        <tr>
          <th>Jenis Transaksi</th>
          <td>
            <?php
              if($invoice->inv_type == 1){
                echo "Tunai";

              }
              else if($invoice->inv_type == 2){
                echo "Tunai & Diantar";
              }
              else if($invoice->inv_type == 3){
                echo "Utang";
              }
              else if($invoice->inv_type == 4){
                echo "Utang & Diantar";
              }
             ?>
          </td>
        </tr>
        <tr>
          <th>Status Pembayaran</th>
          <td>
            <?php
              if($invoice->inv_type == 3){
                if($piutang->piut_status == 1){
                  echo "Lunas";
                }
                else{
                  echo "Belum Lunas";
                  echo "<br>";
                  echo "<a href='/piutangs/{$invoice->piut_id}/edit'>Update Pembayaran</a>";
                }
              }
              else{
                if($invoice->inv_status == 1){
                  echo "Lunas";
                }
                else if($invoice->inv_status == 0){
                  echo "Menunggu Pembayaran";
                }

              }

             ?>
          </td>
        </tr>
      </table>
    </div>
  </div>
  <table class="table table-striped" style="text-align:center;">
    <tr>
      <th>Nama Barang Yang Dipesan</th>
      <th>Jumlah Pesanan</th>
      <th>Harga Satuan</th>
      <th></th>
    </tr>
      @foreach ($products as $product)
        <tr>
          <td>{{$product['item']['item_name']}}</td>
          <td>{{$product['order_quantity']}}</td>
          <td>{{number_format($product['item']['item_price'])}}</td>
          <td>{{number_format($product['order_quantity']*$product['item']['item_price'])}}</td>
          <td>
          </td>
        </tr>
      @endforeach
      <tr>
        <th colspan="3">Total Price</th>
        <td>{{number_format($totPrice)}}</td>
        <td></td>
      </tr>
  </table>

  {!!Form::open(['action'=>['InvoicesController@destroy',$inv_id],'method'=>'POST','class'=>'pull-right','onsubmit'=>"return confirm('Apakah anda yakin akan menghapus data ini?');"])!!}
    {{Form::hidden('_method','DELETE')}}
    {{Form::submit('Hapus Data',['class'=>'btn btn-danger'])}}
  {!!Form::close()!!}

@endsection
