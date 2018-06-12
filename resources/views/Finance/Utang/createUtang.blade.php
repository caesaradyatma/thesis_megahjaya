@extends('layouts.app')

@include('includes.navbar')

@section('content')
  {!! Form::open(['action' => 'UtangsController@store', 'method' => 'POST']) !!}
    <div class="form-group">
      {{Form::label('utg_type', 'Jenis Utang')}}
      {{Form::select('utg_type',[6=>'Pinjaman dari Bank',7=>'Pinjaman dari Orang', 8=>'Pembelian Stock'],'',['class'=>'form-control'])}}
    </div>
    <div class="form-group">
      {{Form::label('utg_name', 'Nama Kreditur')}}
      {{Form::text('utg_name','',['class'=>'form-control','placeholder'=>'Nama Kreditur'])}}
    </div>
    <div class="form-group">
      {{Form::label('utg_amount', 'Jumlah Utang')}}
      {{Form::number('utg_amount','',['class'=>'form-control','placeholder'=>'Jumlah Utang'])}}
    </div>
    <div class="form-group">
      {{Form::label('utg_desc', 'Keterangan')}}
      {{Form::textarea('utg_desc','',['class'=>'form-control'])}}
    </div>
    <div class="form-group">
      {{Form::label('utg_duedate', 'Tanggal Jatuh Tempo')}}
      {{Form::date('utg_duedate','',['class'=>'form-control'])}}
    </div>
    {{Form::submit('Submit',['class'=>'btn btn-primary form-control'])}}
  {!! Form::close() !!}
@endsection
