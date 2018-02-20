@extends('layouts.app')

@include('includes.navbar')

@section('content')
  <a href="/outcomes" class="btn btn-default"style="margin-bottom:20px;">Kembali ke Pengeluaran</a>

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
        <p>{{$outcome->out_id}}</p>
      </td>
      <td>
        @if ($outcome->out_type == 1)
          <p>Utang</p>
        @elseif ($outcome->out_type == 2)
          <p>Biaya</p>
        @elseif ($outcome->out_type == 3)
          <p>DLL</p>
        @endif
      </td>
      <td>
        <p>
          {{$outcome->out_name}}
        </p>
      </td>
      <td>
        <p>{{number_format($outcome->out_amount)}}</p>
      </td>
      <td>
        <p>{{$outcome->out_date}}</p>
      </td>
      <td>
        <p>{{$outcome->out_desc}}</p>
      </td>
      <td>
        <p>{{$outcome->user_id}}</p>
      </td>
      <td>
        <p>{{$outcome->created_at}}</p>
      </td>
      <td>
        <p>{{$outcome->updated_at}}</p>
      </td>
    </tr>
  </table>

  <a href="/outcomes/{{$outcome->out_id}}/edit" class="btn btn-warning">Edit Data</a>

  {!!Form::open(['action'=>['OutcomesController@destroy',$outcome->out_id],'method'=>'POST','class'=>'pull-right','onsubmit'=>"return confirm('Apakah anda yakin akan menghapus data ini?');"])!!}
    {{Form::hidden('_method','DELETE')}}
    {{Form::submit('Hapus Data',['class'=>'btn btn-danger','data-toggle'=>'confirmation'])}}
  {!!Form::close()!!}

@endsection
