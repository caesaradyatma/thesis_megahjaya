@extends('layouts.app')

@include('includes.navbar')

@section('content')
  {!! Form::open(['action' => 'UtangsController@store', 'method' => 'POST']) !!}
    <div class="form-group">
      {{Form::label('out_name', 'Nama Kreditur')}}
      {{Form::text('out_name','',['class'=>'form-control','placeholder'=>'Nama Kreditur'])}}
    </div>
    <div class="form-group">
      {{Form::label('out_amount', 'Jumlah Utang')}}
      {{Form::number('out_amount','',['class'=>'form-control','placeholder'=>'Jumlah Utang'])}}
    </div>
    <div class="form-group">
      {{Form::label('out_desc', 'Keterangan')}}
      {{Form::textarea('out_desc','',['class'=>'form-control'])}}
    </div>
    <div class="form-group">
      {{Form::label('utg_duedate', 'Tanggal Jatuh Tempo')}}
      {{Form::date('utg_duedate','',['class'=>'form-control'])}}
    </div>
    {{Form::submit('Submit',['class'=>'btn btn-primary form-control'])}}
  {!! Form::close() !!}
@endsection