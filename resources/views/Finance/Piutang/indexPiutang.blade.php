@extends('layouts.app')

@include('includes.navbar')

@section('content')
  <h1>Piutang</h1>
  <div class="col-sm-4">
      <small>List Piutang</small>
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
  <div class="col-sm-12">
  @if (count($piutangs)>0)
    <table class="table table-striped">
      <tr>
        <th>Piutang ID</th>
        <th>Status</th>
        <th>Nama</th>
        <th>Keterangan</th>
        <th>Jumlah piutang</th>
        <th>Tanggal Jatuh Tempo</th>
        <th>Details</th>
      </tr>
      @foreach ($piutangs as $piutang)
        <tr>
          <td>
            <p>{{$piutang->piut_id}}</p>
          </td>
          <td>
            @if ($piutang->piut_status == 1)
              <p style="background-color:green;color:white;">Lunas</p>
            @elseif ($piutang->piut_status == 0)
              <p>Belum Lunas</p>
            @endif
          </td>
          <td>
            <p>{{$piutang->piut_name}}</p>
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
  </div>
@endsection
