@extends('layouts.app')

@include('includes.hrNavbar')

@section('content')
  <h1>Absensi Pegawai</h1>
  <small>Tanggal {{$date}}</small>
  <hr>
  {!! Form::open(['action' => 'AttendanceController@store','method' => 'POST']) !!}
    <table class='table table-striped' >
      <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Bagian</th>
        <th>Kontak</th>
        <th>Absensi</th>
      </tr>
      @foreach ($employees as $employee)
        <tr>
          <td>{{$employee->id}}</td>
          <td>{{$employee->emp_name}}</td>
          <td>
            <?php
              if($employee->emp_type == 1){
                echo "Kuli Angkut";
              }
              elseif($employee->emp_type == 2){
                echo "Supir";
              }
              elseif($employee->emp_type == 3){
                echo "Kasir";
              }
             ?>
          </td>
          <td>{{$employee->emp_contact}}</td>
          {{-- <td><a href='attendance/attend/{{$employee->id}}'class='btn btn-primary'>Absen</a></td> --}}
          <td>{{Form::select('emp_type[]',[1=>'Hadir',2=>'Tidak Hadir'],'',['class'=>'form-control'])}}</td>
          {{Form::hidden('idArrray',$employee->id)}}
        </tr>
      @endforeach
    </table>
    {{Form::hidden('_method','POST')}}
    {{Form::submit('Submit',['class'=>'btn btn-primary form-control'])}}
  {!! Form::close() !!}
@endsection
