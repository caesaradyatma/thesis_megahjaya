@extends('layouts.app')

@include('includes.navbar')

@section('content')
  {!! Form::open(['action' => ['UtangsController@update',$utang->utg_id], 'method' => 'POST']) !!}
    <div class="form-group">
      {{Form::label('out_name', 'Nama')}}
      {{Form::text('out_name',$outcome->out_name,['class'=>'form-control','placeholder'=>'Nama Kreditur'])}}
    </div>
    <div class="form-group">
      {{Form::label('out_amount', 'Jumlah')}}
      {{Form::number('out_amount',$outcome->out_amount,['class'=>'form-control','placeholder'=>'Jumlah Utang','min'=>'1'])}}
    </div>
    <div class="form-group">
      {{Form::label('out_desc', 'Keterangan')}}
      {{Form::textarea('out_desc',$outcome->out_desc,['class'=>'form-control'])}}
    </div>
    <div class="form-group">
      {{Form::label('utg_duedate', 'Tanggal Jatuh Tempo')}}
      {{Form::date('utg_duedate',$utang->utg_duedate,['class'=>'form-control'])}}
    </div>
    <div class="form-group">
      {{Form::label('utg_paidamount', 'Jumlah Pembayaran/Pelunasan')}}
      {{Form::number('utg_paidamount',$utang->utg_paidamount,['class'=>'form-control','placeholder'=>'Jumlah Pembayaran','min'=>'1'])}}
    </div>
    <div class="form-group">
      {{Form::label('utg_paiddate', 'Tanggal Pembayaran')}}
      {{Form::date('utg_paiddate',$utang->utg_paiddate,['class'=>'form-control'])}}
    </div>
    <div class="form-group">
      {{Form::label('utg_payer', 'Nama Pembayar/Pelunas')}}
      {{Form::text('utg_payer',$utang->utg_payer,['class'=>'form-control','placeholder'=>'Nama Pembayar'])}}
    </div>
    <div class="form-group">
      {{Form::label('utg_status', 'Status Utang')}}
      {{Form::select('utg_status',['0'=>'Belum Lunas','1'=>'Lunas'],$utang->utg_status,['class'=>'form-control'])}}
    </div>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit',['class'=>'btn btn-primary form-control'])}}
  {!! Form::close() !!}
@endsection
