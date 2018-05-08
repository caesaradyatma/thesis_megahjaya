@extends('layouts.app')

@include('includes.navbar')

@section('content')
  <a href="/invoices" class="btn btn-default"style="margin-bottom:20px;">Kembali ke List Bon</a>

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
