@extends('layouts.app')

@include('includes.navbar')

@section('content')
  <div class="container-fluid">
    <h1>List Barang</h1>
    <h3>Pilih barang yang dipesan pembeli</h3>
    <a href="#" class="btn btn-primary">Lanjut</a>
    <hr>
    <table class="table table-striped">
      <tr>
        <th>ID</th>
        <th>Nama Barang</th>
        <th>Jumlah Stok</th>
        <th>Harga</th>
        <th>Action</th>
      </tr>
      @foreach ($products as $product)
        <tr>
          <td>{{$product->id}}</td>
          <td>{{$product->item_name}}</td>
          <td>{{number_format($product->item_quantity)}} {{$product->item_measurement}}</td>
          <td>{{number_format($product->item_price)}}</td>
          <td><a href="/invoices/{{$product->id}}/getAddToCart" class="btn btn-primary">Pilih Barang</a></td>
        </tr>
      @endforeach
    </table>
  </div>


@endsection
