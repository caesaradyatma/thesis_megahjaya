@extends('layouts.app')

@include('includes.navbar')

@section('content')
  {!! Form::open(['action' => 'FinanceIncomesController@store', 'method' => 'POST']) !!}
    <div class="form-group">
      {{Form::label('in_type', 'Jenis Pendapatan')}}
      {{Form::select('in_type',['1'=>1,'2'=>2,'3'=>3],'',['class'=>'form-control'])}}
    </div>
    <div class="form-group">
      {{Form::label('in_name', 'Nama')}}
      {{Form::text('in_name','',['class'=>'form-control','placeholder'=>'Nama Transaksi'])}}
    </div>
    <div class="form-group">
      {{Form::label('in_amount', 'Jumlah')}}
      {{Form::number('in_amount','',['class'=>'form-control','placeholder'=>'Jumlah Pendapatan'])}}
    </div>
    <div class="form-group">
      {{Form::label('in_date', 'Tanggal Transaksi')}}
      {{Form::date('in_date','',['class'=>'form-control'])}}
    </div>
    <div class="form-group">
      {{Form::label('in_desc', 'Keterangan')}}
      {{Form::textarea('in_desc','',['class'=>'form-control'])}}
    </div>
    {{Form::submit('Submit',['class'=>'btn btn-primary form-control'])}}
  {!! Form::close() !!}
@endsection
