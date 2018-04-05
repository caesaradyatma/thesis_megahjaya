@extends('layouts.app')

@include('includes.navbar')

@section('content')
  {!! Form::open(['action' => 'PiutangsController@store', 'method' => 'POST']) !!}
    <div class="form-group">
      {{Form::label('in_name', 'Nama Debitur')}}
      {{Form::text('in_name','',['class'=>'form-control','placeholder'=>'Nama Debitur'])}}
    </div>
    <div class="form-group">
      {{Form::label('in_amount', 'Jumlah Piutang')}}
      {{Form::number('in_amount','',['class'=>'form-control','placeholder'=>'Jumlah Utang'])}}
    </div>
    <div class="form-group">
      {{Form::label('in_desc', 'Keterangan')}}
      {{Form::textarea('in_desc','',['class'=>'form-control'])}}
    </div>
    <div class="form-group">
      {{Form::label('piut_duedate', 'Tanggal Jatuh Tempo')}}
      {{Form::date('piut_duedate','',['class'=>'form-control'])}}
    </div>
    {{Form::submit('Submit',['class'=>'btn btn-primary form-control'])}}
  {!! Form::close() !!}
@endsection
