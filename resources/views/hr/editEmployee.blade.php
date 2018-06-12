@extends('layouts.app')

@include('includes.hrNavbar')

@section('content')
  {!! Form::open(['action' => ['EmployeeController@update',$employee->id], 'method' => 'POST']) !!}
    <div class="form-group">
      {{Form::label('emp_type', 'Jenis/Pekerjaan Pegawai')}}
      {{Form::select('emp_type',[1=>'Kuli Angkut',2=>'Supir',3=>'Kasir'],$employee->in_type,['class'=>'form-control'])}}
    </div>
    <div class="form-group">
      {{Form::label('emp_name', 'Nama')}}
      {{Form::text('emp_name',$employee->emp_name,['class'=>'form-control','placeholder'=>'Nama Pegawai'])}}
    </div>
    <div class="form-group">
      {{Form::label('emp_age', 'Usia')}}
      {{Form::number('emp_age',$employee->emp_age,['class'=>'form-control','placeholder'=>'Usia Pegawai','min'=>'1'])}}
    </div>
    <div class="form-group">
      {{Form::label('emp_gender', 'Jenis Kelamin')}}
      {{Form::select('emp_gender',[1=>'Pria',2=>'Wanita'],$employee->emp_gender,['class'=>'form-control'])}}
    </div>
    <div class="form-group">
      {{Form::label('emp_contact', 'Kontak')}}
      {{Form::number('emp_contact',$employee->emp_contact,['class'=>'form-control','placeholder'=>'Kontak Pegawai'])}}
    </div>
    <div class="form-group">
      {{Form::label('emp_address', 'Alamat')}}
      {{Form::textarea('emp_address',$employee->emp_address,['class'=>'form-control','placeholder'=>'Alamat Tempat Tinggal'])}}
    </div>
    <div class="form-group">
      {{Form::label('emp_education', 'Pendidikan Terakhir')}}
      {{Form::text('emp_education',$employee->emp_education,['class'=>'form-control','placeholder'=>'Pendidikan Terakhir Pegawai'])}}
    </div>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit',['class'=>'btn btn-primary form-control'])}}
  {!! Form::close() !!}
@endsection
