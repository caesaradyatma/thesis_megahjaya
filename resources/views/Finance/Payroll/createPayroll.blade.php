@extends('layouts.app')

@include('includes.hrNavbar')

@section('content')
  <div class='col=sm-12'>
    <h1>Hasil Penghitungan Gaji</h1>
    <h3>Tanggal {{$date1}} sampai {{$date2}}</h3>
  </div>
  <div class="col-sm-12">
    <table class="table">
      <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Jumlah Absen</th>
        <th>Gaji + Bonus</th>
      </tr>
      @foreach ($employees as $employee)
        <tr>
          <td>{{$employee->id}}</td>
          <td>{{$employee->emp_name}}</td>
          <td>
            <?php
              if($employee->emp_gender ==1){
                echo "Male";
              }
              else{
                echo "Female";
              }
             ?>
          </td>
          <td>
            {{-- {{$freqs[$employee->id]}} --}}
            <?php
              if(isset($freqs[$employee->id])){
                echo $freqs[$employee->id];
              }
              else{
                echo "0";
              }
             ?>
          </td>
          <td>
            {{number_format($salaryArray[$employee->id])}}
          </td>
        </tr>

      @endforeach
      <tr>
        <th colspan="4" style="text-align:center;">
          Total
        </th>
        <td>
          {{number_format($totalPayroll)}}
        </td>
      </tr>
      <?php
        // $size = sizeof($emp_ids);
        // for($x=0;$x<$size;$x++){
        //   echo"<tr>";
        //     echo "<td>".$emp_ids[$x]."</td>";
        //     echo "<td>".$freqs[$emp_ids[$x]]."</td>";
        //   echo"</tr>";
        // }
       ?>
    </table>
    <?php
      $date = date('Y-m-d')
     ?>
    {!! Form::open(['action' => 'OutcomesController@store', 'method' => 'POST']) !!}
      <input type="hidden" name="out_amount" value={{$totalPayroll}}>
      <input type="hidden" name="out_name" value="Gaji {{$date1}}/{{$date2}}">
      <input type="hidden" name="out_date" value="{{$date}}">
      <input type="hidden" name="out_desc" value="Gaji untuk tanggal {{$date1}} hingga {{$date2}}">
      <input type="hidden" name="out_type" value=4>
      <input type="submit" class="btn btn-primary form-control" name="submit" value="Buat Data Pengeluaran">
    {!! Form::close() !!}
  </div>

@endsection
