@extends('layouts.app')

@include('includes.navbar')

@section('content')
  <h1>Pengeluaran</h1>
  
  @if (count($outcomes)>0)
    <table class="table table-striped">
      <tr>
        <th>ID</th>
        <th>Tipe</th>
        <th>Nama</th>
        <th>Jumlah</th>
        <th>Tanggal Transaksi</th>
        <th>Keterangan</th>
        <th>Details</th>
      </tr>
      @foreach ($outcomes as $outcome)
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
            <p>{{$outcome->out_name}}</p>
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
            <a href='/outcomes/{{$outcome->out_id}}'class="btn btn-default">
              Details
            </a>
          </td>
        </tr>
      @endforeach
    </table>
    {{$outcomes->links()}};
  @else
    <div class="btn-danger">
      <p>There are no posts</p>
    </div>
  @endif
@endsection
