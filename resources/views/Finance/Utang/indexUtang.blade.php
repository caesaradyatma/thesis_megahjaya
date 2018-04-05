@extends('layouts.app')

@include('includes.navbar')

@section('content')
  <h1>Utang</h1>
  @if (count($utangs)>0)
    <table class="table table-striped">
      <tr>
        <th>Utang ID</th>
        <th>Status</th>
        <th>Keterangan</th>
        <th>Jumlah Utang</th>
        <th>Tanggal Jatuh Tempo</th>
        <th>Jumlah Pembayaran</th>
        <th>Tanggal Pembayaran</th>
        <th>Nama Pembayar</th>
        <th>Details</th>
      </tr>
      @foreach ($utangs as $utang)
        <tr>
          <td>
            <p>{{$utang->utg_id}}</p>
          </td>
          <td>
            @if ($utang->utg_status == 1)
              <p>Lunas</p>
            @elseif ($utang->utg_status == 0)
              <p>Belum Lunas</p>
            @endif
          </td>
          <td>
            <p>{{$utang->out_name}}</p>
          </td>
          <td>
            <p>{{number_format($utang->out_amount)}}</p>
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
            <a href='/utangs/{{$utang->utg_id}}'class="btn btn-default">
              Details
            </a>
          </td>
        </tr>
      @endforeach
    </table>
    {{-- {{$utangs->links()}}; --}}
  @else
    <div class="btn-danger">
      <p>There are no posts</p>
    </div>
  @endif
@endsection
