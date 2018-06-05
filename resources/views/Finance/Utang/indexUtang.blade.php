@extends('layouts.app')

@include('includes.navbar')

@section('content')
  <h1>Utang</h1>
  <hr>
  <div class="col-sm-4">
      <small>List Utang</small>
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

  @if (count($utangs)>0)
    <table class="table table-striped">
      <tr>
        <th>Utang ID</th>
        <th>Status</th>
        <th>Nama Kreditur</th>
        <th>Keterangan</th>
        <th>Jumlah Utang</th>
        <th>Tanggal Jatuh Tempo</th>
        <th>Details</th>
      </tr>
      @foreach ($utangs as $utang)
        <tr>
          <td>
            <p>{{$utang->utg_id}}</p>
          </td>
          <td>
            @if ($utang->utg_status == 1)
              <p style="background-color:green;color:white;">Lunas</p>
            @elseif ($utang->utg_status == 0)
              <p>Belum Lunas</p>
            @endif
          </td>
          <td>
            <p>{{$utang->utg_name}}</p>
          </td>
          <td>
            <p>{{$utang->utg_desc}}</p>
          </td>
          <td>
            <p>{{number_format($utang->utg_amount)}}</p>
          </td>
          <td>
            <p>{{$utang->utg_duedate}}</p>
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
