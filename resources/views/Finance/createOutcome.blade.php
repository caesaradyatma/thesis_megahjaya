@extends('layouts.app')

@include('includes.navbar')

@section('content')
  {!! Form::open(['action' => 'OutcomesController@store', 'method' => 'POST']) !!}
    <div class="form-group">
      {{Form::label('out_type', 'Jenis Pengeluaran')}}
      {{Form::select('out_type',['1'=>1,'2'=>2,'3'=>3],'',['class'=>'form-control'])}}
    </div>
    <div class="form-group">
      {{Form::label('out_name', 'Nama')}}
      {{Form::text('out_name','',['class'=>'form-control','placeholder'=>'Nama Transaksi'])}}
    </div>
    <div class="form-group">
      {{Form::label('out_amount', 'Jumlah')}}
      {{Form::number('out_amount','',['class'=>'form-control','placeholder'=>'Jumlah Pengeluaran'])}}
    </div>
    <div class="form-group">
      {{Form::label('out_date', 'Tanggal Transaksi')}}
      {{Form::date('out_date','',['class'=>'form-control'])}}
    </div>
    <div class="form-group">
      {{Form::label('out_desc', 'Keterangan')}}
      {{Form::textarea('out_desc','',['class'=>'form-control'])}}
    </div>
    {{Form::submit('Submit',['class'=>'btn btn-primary form-control'])}}
  {!! Form::close() !!}
@endsection
