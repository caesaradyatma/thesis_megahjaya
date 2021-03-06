@extends('layouts.app')

@include('includes.navbar')

@section('content')
  {!! Form::open(['action' => 'PiutangsController@store', 'method' => 'POST']) !!}
    <div class="form-group">
      {{Form::label('piut_type', 'Jenis Utang')}}
      {{Form::select('piut_type',[9=>'Penjualan',10=>'Pinjaman untuk Orang'],'',['class'=>'form-control'])}}
    </div>
    <div class="form-group">
      {{Form::label('piut_name', 'Nama Debitur')}}
      {{Form::text('piut_name','',['class'=>'form-control','placeholder'=>'Nama Debitur'])}}
    </div>
    <div class="form-group">
      {{Form::label('piut_amount', 'Jumlah Piutang')}}
      {{Form::number('piut_amount','',['class'=>'form-control','placeholder'=>'Jumlah Utang'])}}
    </div>
    <div class="form-group">
      {{Form::label('piut_desc', 'Keterangan')}}
      {{Form::textarea('piut_desc','',['class'=>'form-control'])}}
    </div>
    <div class="form-group">
      {{Form::label('piut_duedate', 'Tanggal Jatuh Tempo')}}
      {{Form::date('piut_duedate','',['class'=>'form-control'])}}
    </div>
    {{Form::submit('Submit',['class'=>'btn btn-primary form-control'])}}
  {!! Form::close() !!}
@endsection
