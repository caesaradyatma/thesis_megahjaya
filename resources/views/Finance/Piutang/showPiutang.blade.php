@extends('layouts.app')

@include('includes.navbar')

@section('content')
  <a href="/piutangs" class="btn btn-default"style="margin-bottom:20px;">Kembali ke List piutang</a>

  <table class="table table-striped">
    <tr>
      <th>ID</th>
      <th>Status</th>
      <th>Nama Debittur</th>
      <th>Keterangan</th>
      <th>Jumlah Piutang</th>
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
        <p>{{$piutang->piut_id}}</p>
      </td>
      <td>
        @if ($piutang->piut_status == 0)
          <p>Belum Lunas</p>
        @elseif ($piutang->piut_status == 1)
          <p>Lunas</p>
        @endif
      </td>
      <td>
        <p>
          {{$piutang->piut_name}}
        </p>
      </td>
      <td>
        <p>
          {{$piutang->piut_desc}}
        </p>
      </td>
      <td>
        <p>{{number_format($piutang->piut_amount)}}</p>
      </td>
      <td>
        <p>{{$piutang->piut_duedate}}</p>
      </td>
      <td>
        <p>{{$piutang->piut_paidamount}}</p>
      </td>
      <td>
        <p>{{$piutang->piut_paiddate}}</p>
      </td>
      <td>
        <p>{{$piutang->piut_payer}}</p>
      </td>
      <td>
        <p>{{$piutang->user_id}}</p>
      </td>
      <td>
        <p>{{$piutang->created_at}}</p>
      </td>
      <td>
        <p>{{$piutang->updated_at}}</p>
      </td>
    </tr>
  </table>

  <a href="/piutangs/{{$piutang->piut_id}}/edit" class="btn btn-warning">Edit Data</a>

  {!!Form::open(['action'=>['PiutangsController@destroy',$piutang->piut_id],'method'=>'POST','class'=>'pull-right','onsubmit'=>"return confirm('Apakah anda yakin akan menghapus data ini?');"])!!}
    {{Form::hidden('_method','DELETE')}}
    {{Form::submit('Hapus Data',['class'=>'btn btn-danger','data-toggle'=>'confirmation'])}}
  {!!Form::close()!!}

@endsection
