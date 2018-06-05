@extends('layouts.app')

@include('includes.navbar')

@section('content')
  <div class="container-fluid">
      <h1>List Pegawai</h1>
      <hr>
      <div class="col-sm-4">
          <small>List Utang</small>
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-4">
        <center>
          <form>
            <div class="form-group">
              <input type="text" name="searchValue" style="form-control" placeholder="search">
              <input type="submit" name="submit" value="submit" class="btn btn-primary">
            </div>
          </form>
        </center>
      </div>
      <table class='table table-striped' style="text-align:center;">
        <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>Umur</th>
          <th>Bagian</th>
          <th>Gender</th>
          <th>Kontak</th>
          <th>Alamat</th>
          <th>Pendidikan Terakhir</th>
          <th>Details</th>
        </tr>
        @foreach ($employees as $employee)
          <tr>
            <td>{{$employee->id}}</td>
            <td>{{$employee->emp_name}}</td>
            <td>{{$employee->emp_age}}</td>
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
            <td>{{$employee->emp_contact}}</td>
            <td>{{$employee->emp_address}}</td>
            <td>{{$employee->emp_education}}</td>
            <td><a href='employees/{{$employee->id}}'class='btn btn-default'>Details</a></td>
          </tr>
        @endforeach
      </table>
  </div>
@endsection
