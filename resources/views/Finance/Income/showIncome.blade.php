@extends('layouts.app')

@include('includes.navbar')

@section('content')
  <a href="/incomes" class="btn btn-default"style="margin-bottom:20px;">Kembali ke Pendapatan</a>

  <table class="table table-striped">
    <tr>
      <th>ID</th>
      <th>Tipe</th>
      <th>Nama</th>
      <th>Jumlah</th>
      <th>Tanggal Transaksi</th>
      <th>Keterangan</th>
      <th>User ID</th>
      <th>Tanggal data Dibuat</th>
      <th>Tanggal data Diupdate</th>
    </tr>
    <tr>
      <td>
        <p>{{$income->in_id}}</p>
      </td>
      <td>
        @if ($income->in_type == 1)
          <p>Piutang</p>
        @elseif ($income->in_type == 2)
          <p>Penjualan</p>
        @elseif ($income->in_type == 3)
          <p>Pendapatan Pribadi</p>
        @endif
      </td>
      <td>
        <p>
          {{$income->in_name}}
        </p>
      </td>
      <td>
        <p>{{number_format($income->in_amount)}}</p>
      </td>
      <td>
        <p>{{$income->in_date}}</p>
      </td>
      <td>
        <p>{{$income->in_desc}}</p>
      </td>
      <td>
        <p>{{$income->user_id}}</p>
      </td>
      <td>
        <p>{{$income->created_at}}</p>
      </td>
      <td>
        <p>{{$income->updated_at}}</p>
      </td>
    </tr>
  </table>

  <a href="/incomes/{{$income->in_id}}/edit" class="btn btn-warning">Edit Data</a>

  {!!Form::open(['action'=>['IncomesController@destroy',$income->in_id],'method'=>'POST','class'=>'pull-right','onsubmit'=>"return confirm('Apakah anda yakin akan menghapus data ini?');"])!!}
    {{Form::hidden('_method','DELETE')}}
    {{Form::submit('Hapus Data',['class'=>'btn btn-danger'])}}
  {!!Form::close()!!}
@endsection
