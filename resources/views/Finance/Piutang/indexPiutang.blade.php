@extends('layouts.app')

@include('includes.navbar')

@section('content')
  <h1>piutang</h1>
  @if (count($piutangs)>0)
    <table class="table table-striped">
      <tr>
        <th>Piutang ID</th>
        <th>Status</th>
        <th>Keterangan</th>
        <th>Jumlah piutang</th>
        <th>Tanggal Jatuh Tempo</th>
        <th>Jumlah Pembayaran</th>
        <th>Tanggal Pembayaran</th>
        <th>Nama Pembayar</th>
        <th>Details</th>
      </tr>
      @foreach ($piutangs as $piutang)
        <tr>
          <td>
            <p>{{$piutang->piut_id}}</p>
          </td>
          <td>
            @if ($piutang->piut_status == 1)
              <p>Lunas</p>
            @elseif ($piutang->piut_status == 0)
              <p>Belum Lunas</p>
            @endif
          </td>
          <td>
            <p>{{$piutang->piut_desc}}</p>
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
            <a href='/piutangs/{{$piutang->piut_id}}'class="btn btn-default">
              Details
            </a>
          </td>
        </tr>
      @endforeach
    </table>
    {{-- {{$pipiutangs->links()}}; --}}
  @else
    <div class="btn-danger">
      <p>There are no posts</p>
    </div>
  @endif
@endsection
