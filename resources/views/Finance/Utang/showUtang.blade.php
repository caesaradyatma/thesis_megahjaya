@extends('layouts.app')

@include('includes.navbar')

@section('content')
  <a href="/utangs" class="btn btn-default"style="margin-bottom:20px;">Kembali ke List Utang</a>

  <table class="table table-striped">
    <tr>
      <th>ID</th>
      <th>Status</th>
      <th>Nama Kreditur</th>
      <th>Keterangan</th>
      <th>Jumlah Utang</th>
      <th>Tanggal Jatuh Tempo</th>
      <th>Jumlah Pembayaran</th>
      <th>Tanggal Pembayaran</th>
      <th>Nama Pembayar</th>
      <th>User ID</th>
      <th>Tanggal data Dibuat</th>
      <th>Tanggal data Diupdate</th>
    </tr>
    <tr>
      <td>
        <p>{{$utang->utg_id}}</p>
      </td>
      <td>
        @if ($utang->utg_status == 0)
          <p>Belum Lunas</p>
        @elseif ($utang->utg_status == 1)
          <p>Lunas</p>
        @endif
      </td>
      <td>
        <p>
          {{$utang->utg_name}}
        </p>
      </td>
      <td>
        <p>
          {{$utang->utg_desc}}
        </p>
      </td>
      <td>
        <p>{{number_format($utang->utg_amount)}}</p>
      </td>
      <td>
        <p>{{$utang->utg_duedate}}</p>
      </td>
      <td>
        <p>{{$utang->utg_paidamount}}</p>
      </td>
      <td>
        <p>{{$utang->utg_paiddate}}</p>
      </td>
      <td>
        <p>{{$utang->utg_payer}}</p>
      </td>
      <td>
        <p>{{$utang->user_id}}</p>
      </td>
      <td>
        <p>{{$utang->created_at}}</p>
      </td>
      <td>
        <p>{{$utang->updated_at}}</p>
      </td>
    </tr>
  </table>

  <a href="/utangs/{{$utang->utg_id}}/edit" class="btn btn-warning">Edit Data</a>

  {!!Form::open(['action'=>['UtangsController@destroy',$utang->utg_id],'method'=>'POST','class'=>'pull-right','onsubmit'=>"return confirm('Apakah anda yakin akan menghapus data ini?');"])!!}
    {{Form::hidden('_method','DELETE')}}
    {{Form::submit('Hapus Data',['class'=>'btn btn-danger','data-toggle'=>'confirmation'])}}
  {!!Form::close()!!}

@endsection
