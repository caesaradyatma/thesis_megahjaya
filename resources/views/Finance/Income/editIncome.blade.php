@extends('layouts.app')

@include('includes.navbar')

@section('content')
  {!! Form::open(['action' => ['IncomesController@update',$income->in_id], 'method' => 'POST']) !!}
    <div class="form-group">
      {{Form::label('in_type', 'Jenis Pendapatan')}}
      {{Form::select('in_type',['1'=>1,'2'=>2,'3'=>3],$income->in_type,['class'=>'form-control'])}}
    </div>
    <div class="form-group">
      {{Form::label('in_name', 'Nama')}}
      {{Form::text('in_name',$income->in_name,['class'=>'form-control','placeholder'=>'Nama Transaksi'])}}
    </div>
    <div class="form-group">
      {{Form::label('in_amount', 'Jumlah')}}
      {{Form::number('in_amount',$income->in_amount,['class'=>'form-control','placeholder'=>'Jumlah Pendapatan','min'=>'1'])}}
    </div>
    <div class="form-group">
      {{Form::label('in_date', 'Tanggal Transaksi')}}
      {{Form::date('in_date',$income->in_date,['class'=>'form-control'])}}
    </div>
    <div class="form-group">
      {{Form::label('in_desc', 'Keterangan')}}
      {{Form::textarea('in_desc',$income->in_desc,['class'=>'form-control'])}}
    </div>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit',['class'=>'btn btn-primary form-control'])}}
  {!! Form::close() !!}
@endsection
