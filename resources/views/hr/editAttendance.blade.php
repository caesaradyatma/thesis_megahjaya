@extends('layouts.app')

@include('includes.navbar')

@section('content')
  <table class='table table-striped' style="text-align:center;">
    <tr>
      <th>ID</th>
      <th>Nama</th>
      <th>Status</th>
    </tr>
    @foreach ($employees as $employee)
      <tr>
        <td>{{$employee->id}}</td>
        <td>{{$employee->emp_name}}</td>
        <td>
          @foreach ($attendees as $attendee)
            <?php
              if($employee->id == $attendee['id']){
                echo"Hadir";
              }
             ?>
          @endforeach
        </td>
        {{-- <td><a href='attendance/attend/{{$employee->id}}'class='btn btn-primary'>Hadir</a></td> --}}
        {{-- <td>{{Form::select('emp_type[]',[1=>'Hadir',2=>'Tidak Hadir'],'',['class'=>'form-control'])}}</td> --}}
      </tr>
    @endforeach
  </table>
@endsection
