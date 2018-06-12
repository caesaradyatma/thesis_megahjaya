@extends('layouts.app')

@include('includes.navbar')

@section('content')
  <h1>Bon/Invoice</h1>

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
              <table class="table">
                <tr>
                  <th>{{Form::label('inv_date', 'Tanggal Transaksi')}}</th>
                  <td>{{Form::number('inv_day','',['min'=>'1','max'=>'31','placeholder'=>'Hari','class'=>'form-control'])}}</td>
                  <td>{{Form::number('inv_month','',['min'=>'1','max'=>'12','placeholder'=>'Bulan','class'=>'form-control'])}}</td>
                  <td>{{Form::number('inv_year','',['min'=>'2017','placeholder'=>'Tahun','class'=>'form-control'])}}</td>
                </tr>
              </table>
              {{-- {{Form::label('inv_date', 'Tanggal Transaksi')}}
              {{Form::number('inv_day','',['min'=>'1','max'=>'31'])}}
              {{Form::number('inv_month','',['min'=>'1','max'=>'12','placeholder'=>'Bulan'])}}
              {{Form::number('inv_year','',['min'=>'2017','placeholder'=>'Tahun'])}} --}}
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
        Cari Bon
      </button>
      <a href="invoices/create" class="btn btn-success">Buat Bon Baru</a>
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
        <th>Jenis Bon</th>
        <th>Status</th>
        <th>Lihat Detail</th>
        {{-- <th>Barang Yang dibeli</th> --}}
      </tr>
      @foreach ($cst_names as $cst_name)
        <tr>
          <td>{{$cst_name->inv_id}}</td>
          <td>{{$cst_name->inv_date}}</td>
          <td>{{$cst_name->cst_name}}</td>
          <td>{{number_format($cst_name->inv_totPrice)}}</td>
          <td>
            <?php
              if($cst_name->inv_type == 1){
                echo "Bon 1";

              }
              else if($cst_name->inv_type == 2){
                echo "Bon 2";
              }
              else if($cst_name->inv_type == 3){
                echo "Bon 3";
              }
              else if($cst_name->inv_type == 4){
                echo "Bon 2";
              }
             ?>
          </td>
          <td>
            <?php

              foreach($piutangs as $piutang){
                if($cst_name->inv_type == 1 || $cst_name->inv_type == 2){
                  echo "<p style='background-color:green;color:white;'>Lunas</p>";
                  break 1;
                }
                if($piutang->piut_id == $cst_name->piut_id){
                  $status = $piutang->piut_status;
                  if($status == 1){
                    echo "<p style='background-color:green;color:white;'>Lunas</p>";
                    break 1;
                  }
                  else if($status == 0){
                    echo "Menunggu Pembayaran";
                  }
                }
                // else {
                //   echo "Lunas";
                // }

              }
              // if($cst_name->inv_status == 1){
              //   echo "Lunas";
              // }
              // else if($cst_name->inv_status == 0){
              //   echo "Menunggu Pembayaran";
              // }
             ?>
          </td>
          {{-- <td>{{$invoice->inv_products}}</td> --}}
          <td><a href="invoices/detail/{{$cst_name->inv_id}}" class="btn btn-primary">Detail</a></td>
        </tr>
      @endforeach
    </table>
  </div>
@endsection
