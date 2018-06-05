@extends('layouts.app')

@include('includes.navbar')

@section('content')
  {!! Form::open(['action' => 'AttendanceController@update','method' => 'POST']) !!}
    <table class='table table-striped'>
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
            <?php
            $x = 1;
            $size = sizeof($attendances);
             ?>
            @foreach ($attendances as $attendance)
              <?php
                if($employee->id == $attendance->atd_ids){
                  echo"Hadir";
                  break 1;
                }
                else if($x == $size && $employee->id != $attendance->atd_ids){
                ?>
                  {{Form::select('emp_type[]',[1=>'Hadir',2=>'Tidak Hadir'],'',['class'=>'form-control'])}}
                  <input type="hidden" name="idArray[]" value="{{$employee->id}}">
                <?php
                }
                $x++;
               ?>
            @endforeach
          </td>
        </tr>
      @endforeach
    </table>
    {{Form::hidden('_method','POST')}}
    {{Form::submit('Submit',['class'=>'btn btn-primary form-control'])}}
  {!! Form::close() !!}
@endsection
