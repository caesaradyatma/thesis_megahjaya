@extends('layouts.app')

@include('includes.navbar')

@section('content')
  <h1>Invoice/Bon</h1>
  <div class="row">
    <table class="table table-striped">
      <tr>
        <th>ID</th>
        <th>Tanggal Transaksi</th>
        <th>Nama Pelanggan</th>
        <th>Jumlah Transaksi</th>
        <th>Jenis Transaksi</th>
        <th>Status</th>
        <th>Barang Yang dibeli</th>
      </tr>
      @foreach ($invoices as $invoice)
        <tr>
          <td>{{$invoice->id}}</td>
          <td>{{$invoice->inv_date}}</td>
          <td>{{$invoice->cst_id}}</td>
          <td>{{$invoice->inv_totPrice}}</td>
          <td>{{$invoice->inv_type}}</td>
          <td>{{$invoice->inv_status}}</td>
          <td>{{$invoice->inv_products}}</td>
        </tr>
      @endforeach
    </table>
  </div>
@endsection
