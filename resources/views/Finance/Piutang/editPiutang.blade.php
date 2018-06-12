@extends('layouts.app')

@include('includes.navbar')

@section('content')
  {!! Form::open(['action' => ['PiutangsController@update',$piutang->piut_id], 'method' => 'POST']) !!}
    <div class="form-group">
      {{Form::label('piut_type', 'Jenis Utang')}}
      {{Form::select('piut_type',[9=>'Penjualan',10=>'Pinjaman untuk Orang'],'',['class'=>'form-control'])}}
    </div>
    <div class="form-group">
      {{Form::label('piut_name', 'Nama')}}
      {{Form::text('piut_name',$piutang->piut_name,['class'=>'form-control','placeholder'=>'Nama Debittur'])}}
    </div>
    <div class="form-group">
      {{Form::label('piut_amount', 'Jumlah')}}
      {{Form::number('piut_amount',$piutang->piut_amount,['class'=>'form-control','placeholder'=>'Jumlah Piutang','min'=>'1'])}}
    </div>
    <div class="form-group">
      {{Form::label('piut_desc', 'Keterangan')}}
      {{Form::textarea('piut_desc',$piutang->piut_desc,['class'=>'form-control'])}}
    </div>
    <div class="form-group">
      {{Form::label('piut_duedate', 'Tanggal Jatuh Tempo')}}
      {{Form::date('piut_duedate',$piutang->piut_duedate,['class'=>'form-control'])}}
    </div>
    <div class="form-group">
      {{Form::label('piut_paidamount', 'Jumlah Pembayaran/Pelunasan')}}
      {{Form::number('piut_paidamount',$piutang->piut_paidamount,['class'=>'form-control','placeholder'=>'Jumlah Pembayaran','min'=>'1'])}}
    </div>
    <div class="form-group">
      {{Form::label('piut_paiddate', 'Tanggal Pembayaran')}}
      {{Form::date('piut_paiddate',$piutang->piut_paiddate,['class'=>'form-control'])}}
    </div>
    <div class="form-group">
      {{Form::label('piut_payer', 'Nama Pembayar/Pelunas')}}
      {{Form::text('piut_payer',$piutang->piut_payer,['class'=>'form-control','placeholder'=>'Nama Pembayar'])}}
    </div>
    <div class="form-group">
      {{Form::label('piut_status', 'Status piutang')}}
      {{Form::select('piut_status',['0'=>'Belum Lunas','1'=>'Lunas'],$piutang->piut_status,['class'=>'form-control'])}}
    </div>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit',['class'=>'btn btn-primary form-control'])}}
  {!! Form::close() !!}
@endsection
