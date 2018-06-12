@extends('layouts.app')

@include('includes.hrNavbar')

@section('content')
  <h2>Akumulasi Gaji</h2>
  <small>Input periode gaji</small><br>
  <a href='payroll/setPayrollView'>Setting Gaji</a>
  {!! Form::open(['action' => 'PayrollController@create','method' => 'GET']) !!}
    <div class="form-group">
      {{Form::label('date1', 'Tanggal Mulai')}}
      {{Form::date('date1','',['class'=>'form-control'])}}
    </div>
    <div class="form-group">
      {{Form::label('date2', 'Tanggal Akhir')}}
      {{Form::date('date2','',['class'=>'form-control'])}}
    </div>
    {{Form::hidden('_method','GET')}}
    {{Form::submit('Submit',['class'=>'btn btn-primary form-control'])}}
  {!! Form::close() !!}
@endsection
