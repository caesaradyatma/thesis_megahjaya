@extends('layouts.app')

@include('includes.navbar')

@section('content')
  {!! Form::open(['action' => ['OutcomesController@update',$outcome->out_id], 'method' => 'POST']) !!}
    <div class="form-group">
      {{Form::label('out_type', 'Jenis Pengeluaran')}}
      {{Form::select('out_type',[3=>'Biaya',4=>'Gaji Karyawan', 5=>'Bensin', 11=>'Pembelian Inventory'],'',['class'=>'form-control'])}}
    </div>
    <div class="form-group">
      {{Form::label('out_name', 'Nama')}}
      {{Form::text('out_name',$outcome->out_name,['class'=>'form-control','placeholder'=>'Nama Transaksi'])}}
    </div>
    <div class="form-group">
      {{Form::label('out_amount', 'Jumlah')}}
      {{Form::number('out_amount',$outcome->out_amount,['class'=>'form-control','placeholder'=>'Jumlah Pengeluaran','min'=>'1'])}}
    </div>
    <div class="form-group">
      {{Form::label('out_date', 'Tanggal Transaksi')}}
      {{Form::date('out_date',$outcome->out_date,['class'=>'form-control'])}}
    </div>
    <div class="form-group">
      {{Form::label('out_desc', 'Keterangan')}}
      {{Form::textarea('out_desc',$outcome->out_desc,['class'=>'form-control'])}}
    </div>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit',['class'=>'btn btn-primary form-control'])}}
  {!! Form::close() !!}
@endsection
