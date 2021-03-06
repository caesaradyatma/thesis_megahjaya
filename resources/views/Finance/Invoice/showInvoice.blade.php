@extends('layouts.app')

@include('includes.navbar')

@section('content')
  <a href="/invoices" class="btn btn-default"style="margin-bottom:20px;">Kembali ke List Bon</a>
  <div class="panel panel-primary">
    <div class="panel-heading">
      Data Bon
    </div>
    <div class="panel-body">
      <table class="table">
        <tr>
          <th>ID Bon</th>
          <td>{{$inv_id}}</td>
        </tr>
        <tr>
          <th>Tanggal Bon</th>
          <td>{{$invoice->inv_date}}</td>
        </tr>
        <tr>
          <th>Jenis Bon</th>
          <td>
            <?php
              if($invoice->inv_type == 1){
                echo "Bon 1";

              }
              else if($invoice->inv_type == 2){
                echo "Bon 2";
              }
              else if($invoice->inv_type == 3){
                echo "Bon 3";
              }
              else if($invoice->inv_type == 4){
                echo "Bon 2";
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
        <tr>
          <th>Nomor Telepon</th>
          <td>{{$invoice->inv_phone}}</td>
        </tr>
        <tr>
          <th>Alamat</th>
          <td>{{$invoice->inv_address}}</td>
        </tr>
        <tr>
          <th>PPN 10%</th>
          <td>
            <?php
              if($invoice->inv_tax == 1){
                echo "Ya";
              }
              else{
                echo "Tidak";
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
        <th colspan="3">Total</th>
        <td>{{number_format($totPrice)}}</td>
        <td></td>
      </tr>
      <tr>
        <td colspan="3" style="text-align:left;"><small>termasuk PPN 10% jika diterapkan</small></td>
      </tr>
  </table>

  {!!Form::open(['action'=>['InvoicesController@destroy',$inv_id],'method'=>'POST','class'=>'pull-right','onsubmit'=>"return confirm('Apakah anda yakin akan menghapus data ini?');"])!!}
    {{Form::hidden('_method','DELETE')}}
    {{Form::submit('Hapus Data',['class'=>'btn btn-danger'])}}
  {!!Form::close()!!}

@endsection
