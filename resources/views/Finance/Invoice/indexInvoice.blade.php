@extends('layouts.app')

@include('includes.navbar')

@section('content')
  <h1>Invoice/Bon</h1>

  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Cari Invoice</h5>
          <small>tidak semua kolom harus di isi</small>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {!! Form::open(['action' => 'InvoicesController@searchInvoice', 'method' => 'POST']) !!}
            <div class="form-group">
              {{Form::label('inv_id', 'ID Invoice')}}
              {{Form::number('inv_id','',['class'=>'form-control','placeholder'=>'ID Invoice'])}}
            </div>
            <div class="form-group">
              {{Form::label('cst_name', 'Nama Pelanggan')}}
              {{Form::text('cst_name','',['class'=>'form-control','placeholder'=>'Nama Pelanggan'])}}
            </div>
            <div class="form-group">
              {{Form::label('cst_company', 'Nama Perusahaan')}}
              {{Form::text('cst_company','',['class'=>'form-control','placeholder'=>'Nama Perusahaan'])}}
            </div>
            <div class="form-group">
              {{Form::label('inv_date', 'Tanggal Transaksi')}}
              {{-- {{Form::date('inv_date','',['class'=>'form-control','placeholder'=>'Tanggal Invoice'])}} --}}
              {{Form::number('inv_day','',['min'=>'1','max'=>'31'])}}
              {{Form::number('inv_month','',['min'=>'1','max'=>'12','placeholder'=>'Bulan'])}}
              {{Form::number('inv_year','',['min'=>'2017','placeholder'=>'Tahun'])}}
            </div>
            {{Form::hidden('_method','POST')}}
            {{Form::submit('Submit',['class'=>'btn btn-primary form-control'])}}
          {!! Form::close() !!}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <div class="row" style="margin-top:20px;">

    <div class="col-sm-12">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Cari Invoice
      </button>
      <hr>
    </div>
  </div>
  <div class="row">
    <table class="table table-striped">
      <tr>
        <th>ID</th>
        <th>Tanggal Transaksi</th>
        <th>Nama Pelanggan</th>
        <th>Jumlah Transaksi</th>
        <th>Jenis Transaksi</th>
        <th>Status</th>
        <th>Lihat Detail</th>
        {{-- <th>Barang Yang dibeli</th> --}}
      </tr>
      @foreach ($cst_names as $cst_name)
        <tr>
          <td>{{$cst_name->inv_id}}</td>
          <td>{{$cst_name->inv_date}}</td>
          <td>{{$cst_name->cst_name}}</td>
          <td>{{$cst_name->inv_totPrice}}</td>
          <td>{{$cst_name->inv_type}}</td>
          <td>{{$cst_name->inv_status}}</td>
          {{-- <td>{{$invoice->inv_products}}</td> --}}
          <td><a href="invoices/detail/{{$cst_name->inv_id}}" class="btn btn-primary">Detail</a></td>
        </tr>
      @endforeach
    </table>
  </div>
@endsection
