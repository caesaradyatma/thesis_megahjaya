@extends('layouts.app')

@include('includes.hrNavbar')
  <div class="col-sm-12">
    <a href="/employees" class="btn btn-default" style="margin-bottom:20px;">Kembali ke List Pegawai</a>
      <h2>List Pegawai</h2>
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
          <th>Tanggal Data Dibuat</th>
          <th>Tanggal Data Diupdate</th>
          <th>User Terakhir</th>
        </tr>
          <tr>
            <td>{{$employee->id}}</td>
            <td>{{$employee->emp_name}}</td>
            <td>{{$employee->emp_age}}</td>
            <td>{{$employee->emp_type}}</td>
            <td>{{$employee->emp_gender}}</td>
            <td>{{$employee->emp_contact}}</td>
            <td>{{$employee->emp_address}}</td>
            <td>{{$employee->emp_education}}</td>
            <td>{{$employee->created_at}}</td>
            <td>{{$employee->updated_at}}</td>
            <td>{{$employee->user_id}}</td>
          </tr>
      </table>

    <a href="/employees/{{$employee->id}}/edit" class="btn btn-warning">Edit Data</a>

    {!!Form::open(['action'=>['EmployeeController@destroy',$employee->id],'method'=>'POST','class'=>'pull-right','onsubmit'=>"return confirm('Apakah anda yakin akan menghapus data ini?');"])!!}
      {{Form::hidden('_method','DELETE')}}
      {{Form::submit('Hapus Data',['class'=>'btn btn-danger'])}}
    {!!Form::close()!!}
  </div>
@section('content')
@endsection
