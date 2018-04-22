@extends('layouts.app')

@include('includes.navbar')
  <div class="container-fluid">
      <h1>List Pegawai</h1>
      <hr>
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
            <td>{{$employee->emp_type}}</td>
            <td>{{$employee->emp_gender}}</td>
            <td>{{$employee->emp_contact}}</td>
            <td>{{$employee->emp_address}}</td>
            <td>{{$employee->emp_education}}</td>
            <td><a href='employees/{{$employee->id}}'class='btn btn-default'>Details</a></td>
          </tr>
        @endforeach
      </table>
  </div>
@section('content')
@endsection
